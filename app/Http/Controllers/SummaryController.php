<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\ShipInfo;
use Illuminate\Support\Facades\Auth;
use Mail;

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

    public function export_csv()
    {

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
            $message->to(Auth::User()->email, 'Tutorials Point')->subject
            ('Laravel Testing Mail with Attachment');
            $message->from('goldengolem0815@gmail.com','Test User');
        });
        return redirect()->route('summary');
    }
}
