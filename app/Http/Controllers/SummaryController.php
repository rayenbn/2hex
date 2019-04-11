<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\ShipInfo;
use Illuminate\Support\Facades\Auth;
use Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\OrderExport;

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
                            $fees[$key][$value]['price'] = $this->getPriceDesign($fees[$key][$value]['quantity']);
                        } 

                        
                        $sum_fees += $fees[$key][$value]['price'];
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
                    $fees[$key][$value]['price'] = $this->getPriceDesign($order['quantity']);
                } else {
                    $fees[$key][$value]['price'] = $this->feesTypes[$key]['price'];
                }

                // Calculate total sum
                $sum_fees += $fees[$key][$value]['price'];
            }
        }

        // Set Global delivery
        if (count($fees)) {
            $fees['global'] = [];
            array_push($fees['global'], [
                'image' => 'Global delivery', 
                'batches' => '', 
                'price' => $globalSum = Order::getGlobalDelivery(), 
                'type' => 'Global delivery'
            ]);
            $sum_fees += $globalSum;
        }

        return view('summary', compact('fees', 'sum_fees'));
    }


    private function getPriceDesign($quantity)
    {
        $total = 0;

        if (($quantity - 625) * 0.8 > 0) {
            $total = ($quantity - 625) * 0.8;
        }

        return 500 + $total;
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

        Mail::send(new \App\Mail\OrderSubmit($info->toArray()));

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
        $save_data['saved_date'] =new \DateTime();

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
}
