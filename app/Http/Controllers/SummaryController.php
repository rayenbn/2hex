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

        $orders = (clone $ordersQuery)
            ->select('bottomprint', 'topprint', 'engravery', 'cardboard', 'carton')
            ->get()
            ->map(function($order) {
                return array_filter($order->attributesToArray());
            })
            ->toArray();

        $fees = [];

        foreach ($orders as $index => $order) {
            $index += 1;
            foreach ($order as $key => $value) {
                if (!array_key_exists($key,  $this->feesTypes)) continue;
                $fees[$key . $value] = [
                    'image'   => $value,
                    'batches' => $index,
                    'price'   => $this->feesTypes[$key]['price'],
                    'type'    => $this->feesTypes[$key]['name']
                ];
            }
        }

        if (count($fees)) {
            array_push($fees, [
                'image' => 'Global delivery', 
                'batches' => '', 
                'price' => Order::getGlobalDelivery(), 
                'type' => 'Global delivery'
            ]);
        }

        $sum_fees = array_sum(array_column($fees, 'price'));

        return view('summary', compact('fees', 'sum_fees'));
    }


    public function exportcsv()
    {
        $queryOrders = Order::auth();
        dispatch($exporter = new \App\Jobs\GenerateInvoicesXLSX($queryOrders->get()));
        dd($exporter);
        $queryOrders->update(['invoice_number' => (string) $exporter->getInvoiceNumber()]);

        return response()->download($exporter->getPathInvoice());
    }

    public function exportcsvbyid($id)
    {
        $save_data['usenow'] = 0;
        //$save_data['saved_date'] =new \DateTime();

        $created_by = auth()->check() ? auth()->id() : csrf_token();

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
            $created_by = Auth::user()->id;
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
            $created_by = Auth::user()->id;
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
            $created_by = Auth::user()->id;
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
            $created_by = Auth::user()->id;
        }
        else{
            $created_by = csrf_token();
        }
        Order::where('created_by','=',$created_by)->where('saved_date','=',$id)->delete();
        return redirect()->route('profile');
    }
}
