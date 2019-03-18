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
            $orders = Order::where('created_by','=',$id)->get();
        }
        else{
            $token = csrf_token();
            $orders = Order::where('created_by','=',$token)->get();    
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

        return Excel::download(new OrderExport, 'invoices.xlsx');
    }

    public function submitOrder()
    {

        if(Auth::user()){
            $id = Auth::user()->id;
            $info = ShipInfo::where('created_by','=',$id)->first();
        }
        else{
            $token = csrf_token();
            $info = ShipInfo::where('created_by','=',$token)->first();    
        }

        $data = array('name' => $info['invoice_name']);

        

        Mail::send('mail', $data, function($message){
            $name = uniqid(rand(), true).'.xlsx';
            $file =  Excel::store('vniklas@connect.ust.hk', $name);
            $message->to('luckygolden0505@gmail.com', 'Tutorials Point')->subject
            ('Laravel Testing Mail with Attachment');
            $message->from('goldengolem0815@gmail.com','Test User');
            $message->attach(storage_path('app/'.$name));
        });
        return redirect()->route('summary');
    }
}
