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
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()){
            $id = Auth::user()->id;
            $orders = Order::where('created_by','=',$id)->where('usenow','=','1')->get();
        }
        else{
            $token = csrf_token();
            $orders = Order::where('created_by','=',$token)->where('usenow','=','1')->get();
        }   
        return view('summary',['orders'=>$orders]);
    }

    public function exportcsv()
    {

        if(Auth::user()){
            $created_by = Auth::user()->id;
        }
        else{
            $created_by = csrf_token();
        }

        return Excel::download(new OrderExport($created_by), 'invoices.xlsx');
    }

    public function submitOrder()
    {

        if(Auth::user()){
            $id = Auth::user()->id;
            $info = ShipInfo::where('created_by','=',$id)->first();
            $data = [];
            $data['submit'] = 1;
            $data['saved_date'] =new \DateTime();
            Order::where('created_by','=',$id)->where('usenow','=',1)->update($data); 
        }
        else{
            $token = csrf_token();
            $info = ShipInfo::where('created_by','=',$token)->first();    
            
            $data = [];
            $data['submit'] = 1;
            $data['saved_date'] =new \DateTime();
            Order::where('created_by','=',$token)->where('usenow','=',1)->update($data); 
        }



        $data = array('name' => $info['invoice_name']);

        

        Mail::send('mail', $data, function($message){
            $name = uniqid(rand(), true).'.xlsx';
            $file =  Excel::store(new OrderExport(Auth::user()->id), $name);
            $message->to('niklas@2hex.com', 'Tutorials Point')->subject
            ('Laravel Testing Mail with Attachment');
            $message->from('goldengolem0815@gmail.com','Test User');
            $message->attach(storage_path('app/'.$name));
        });
        return redirect()->route('summary');
    }

    function saveOrder()
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
    function load($id)
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
}
