<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Order, GripTape};
use App\Models\ShipInfo;
use Illuminate\Support\Facades\Auth;
use Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\OrderExport;
// use App\Jobs\RecalculateOrders;
use Itlead\Promocodes\Models\Promocode;

class SummaryController extends Controller
{
    protected $feesTypes = [
        'engravery' => [
            'name' => 'Top Engravery Set Up',
            'price' => 80
        ],
        'topprint' => [
            'name' => 'Top Print Set Up',
            'price' => 120
        ],
        'bottomprint' => [
            'name' => 'Bottom Print Set Up',
            'price' => 120
        ],
        'carton' => [
            'name' => 'Box print Set Up',
            'price' => 120
        ],
        'cardboard' => [
            'name' => 'Cardboard Set Up',
            'price' => 500
        ],
    ];
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordersQuery = Order::auth();
        $gripQuery = GripTape::auth();

                // Order weight
        $weight = ($ordersQuery->sum('quantity') * Order::SKATEBOARD_WEIGHT) 
            + ($gripQuery->sum('quantity') * GripTape::GRIPTAPE_WEIGHT);

        // Fetching all desing by orders
        $orders = (clone $ordersQuery)
            ->select('quantity', 'bottomprint', 'topprint', 'engravery', 'cardboard', 'carton')
            ->get()
            ->map(function($order) {
                return array_filter($order->attributesToArray());
            })
            ->toArray();

        $fees = [];
        $sum_fees = 0;

        foreach ($orders as $index => $order) {
            $index += 1;

            foreach ($order as $key => $value) {
                if (!array_key_exists($key,  $this->feesTypes)) continue;

                // If same design
                if (array_key_exists($key, $fees)) {
                    if (array_key_exists($value, $fees[$key])) {
                        $fees[$key][$value]['batches'] .= ",{$index}";
                        $fees[$key][$value]['quantity'] += $order['quantity'];

                        if ($key == 'cardboard') {
                            $fees[$key][$value]['price'] = Order::getPriceDesign($fees[$key][$value]['quantity']);
                        }
                        continue;
                    }
                } 
                $fees[$key][$value] = [
                    'image'    => $value,
                    'batches'  => (string) $index,
                    'type'     => $this->feesTypes[$key]['name'],
                    'quantity' => $order['quantity'],
                ];

                /*
                 * Cardboard price calculated 
                 * Formula: 500 + (quantity - 625) * 0.8
                 * If (quantity - 625) * 0.8 < 0 then 0
                 */ 
                if ($key == 'cardboard') {
                    $fees[$key][$value]['price'] = Order::getPriceDesign($order['quantity']);
                } else {
                    $fees[$key][$value]['price'] = $this->feesTypes[$key]['price'];
                }

            }
        }

        // Set Global delivery
        if ($ordersQuery->count() || $gripQuery->count()) {
            $fees['global'] = [];
            array_push($fees['global'], [
                'image' => auth()->check() ? $weight . ' KG' : '$?.??', 
                'batches' => '', 
                'price' => Order::getGlobalDelivery(), 
                'type' => 'Global delivery'
            ]);
        }

        // Calculate total price
        foreach ($fees as $key => $value) {
            array_walk($value, function($f, $k) use(&$sum_fees){
                $sum_fees += $f['price'];
            });
        }

        // calculate total 
        $totalOrders = $ordersQuery->sum('total') + GripTape::auth()->sum('total') + $sum_fees;

        $promocode = $ordersQuery->count() ? $ordersQuery->first()->promocode : false;

        if ($promocode) {
            
            $promocode = json_decode($promocode);

            switch ($promocode->type) {
                case Promocode::FIXED :
                    $totalOrders -= $promocode->reward;
                    break;
                
                case Promocode::PERCENT:
                    $totalOrders -= $totalOrders * $promocode->reward / 100;
                    break;
            }
        }

        return view('summary', compact('fees', 'totalOrders'));
    }

    public function exportcsv()
    {
        $queryOrders = Order::auth();
        dispatch($exporter = new \App\Jobs\GenerateInvoicesXLSX($queryOrders->get()));

        $queryOrders->update(['invoice_number' => $exporter->getInvoiceNumber()]);

        return response()->download($exporter->getPathInvoice());
    }

    public function exportcsvbyid($id)
    {
        $save_data['usenow'] = 0;
        //$save_data['saved_date'] =new \DateTime();

        $created_by = (string) (auth()->check() ? auth()->id() : csrf_token());

        Order::where('created_by','=',$created_by)->where('usenow', '=', 1)->update($save_data);
        $data = Order::where('created_by','=',$created_by)->where('saved_date', '=', $id)->get();
        for($i = 0; $i < count($data); $i ++){
            unset($data[$i]['id']);
            unset($data[$i]['saved_date']);
            unset($data[$i]['usenow']);
            unset($data[$i]['submit']);
            $array = json_decode(json_encode($data[$i]), true);
            Order::insert($array);
        }

        $orders = Order::auth()->get();

        $exporter = new \App\Jobs\GenerateInvoicesXLSX($orders);
        $exporter->setInvoiceNumber($orders->first()->invoice_number);
        $exporter->setDate($orders->first()->created_at->timestamp);

        dispatch($exporter);
        
        return response()->download($exporter->getPathInvoice());
    }

    public function submitOrder()
    {
        $info = ShipInfo::auth()->select('invoice_name')->first(); 
        $queryOrders = Order::auth();

        Mail::to(auth()->user())->send(new \App\Mail\OrderSubmit($info->toArray()));

        $queryOrders->update([
            'submit' => 1,
            'saved_date' => now()
        ]);

        session()->flash('success', 'Your order has been successfully sent!'); 

        return redirect()->route('summary');
    }

    public function saveOrder()
    {
        if(Auth::user()){
            $created_by = (string) auth()->id();
        }
        else{
            $created_by = csrf_token();
        }

        $data = Order::where('created_by','=',$created_by)->where('usenow', '=', 1)->get();

        $save_data = [
            'usenow' => 0
        ];
        $save_data['usenow'] = 0;
        $save_data['saved_date'] = now();

        Order::where('created_by','=',$created_by)->where('usenow', '=', 1)->update($save_data);
        for($i = 0; $i < count($data); $i ++){
            unset($data[$i]['id']);
            unset($data[$i]['saved_date']);
            $array = json_decode(json_encode($data[$i]), true);

            Order::insert($array);
        }

        return redirect()->route('summary');   
    }
    public function load($id)
    {
        $save_data['usenow'] = 0;
        //$save_data['saved_date'] =new \DateTime();

        
        if(Auth::user()){
            $created_by = (string) auth()->id();
        }
        else{
            $created_by = csrf_token();
        }
        Order::where('created_by','=',$created_by)->where('usenow', '=', 1)->update($save_data);
        $data = Order::where('created_by','=',$created_by)->where('saved_date', '=', $id)->get();
        for($i = 0; $i < count($data); $i ++){
            unset($data[$i]['id']);
            unset($data[$i]['saved_date']);
            unset($data[$i]['usenow']);
            unset($data[$i]['submit']);
            $array = json_decode(json_encode($data[$i]), true);
            Order::insert($array);
        }
        return redirect()->route('summary');   
    } 
    public function view($id)
    {
        $save_data['usenow'] = 0;
        //$save_data['saved_date'] =new \DateTime();

        
        if(Auth::user()){
            $created_by = (string) auth()->id();
        }
        else{
            $created_by = csrf_token();
        }
        Order::where('created_by','=',$created_by)->where('usenow', '=', 1)->update($save_data);
        $data = Order::where('created_by','=',$created_by)->where('saved_date', '=', $id)->get();
        for($i = 0; $i < count($data); $i ++){
            unset($data[$i]['id']);
            unset($data[$i]['saved_date']);
            unset($data[$i]['usenow']);
            unset($data[$i]['submit']);
            $array = json_decode(json_encode($data[$i]), true);
            Order::insert($array);
        }
        return redirect()->route('summary')->with(['viewonly'=>1]);   
    }
    public function removeOrder($id)
    {
        if(Auth::user()){
            $created_by = (string) auth()->id();
        }
        else{
            $created_by = csrf_token();
        }
        Order::where('created_by','=',$created_by)->where('saved_date','=',$id)->delete();
        return redirect()->route('profile');
    }

    public function applyPromocode(Request $request)
    {
        $this->validate($request, ['promocode' => 'required|min:2']);

        $checkCode = $request->get('promocode', '');

        $promocode = \Promocodes::check($checkCode);

        if (!$promocode) {
            return response()->json(["errors" => "The given data was invalid."], 400);
        }

        $queryOrders = Order::auth();
        $totalOrders = $queryOrders->sum('total');

        if (($promocode->is_supplement && $totalOrders >= 300) 
            || (!$promocode->is_supplement && $totalOrders >= 500)
        ) {
            $response = \Promocodes::apply($checkCode);

            list($code, $promocode) = $response;

            // set discount for all orders
            $queryOrders->update([
                'promocode' => json_encode(
                    array_merge($promocode->toArray(), ['code' => $code])
                )
            ]);

            return response()->json($code);
        }

        return response()->json(["errors" => "The given data was invalid."], 400);
    }
}
