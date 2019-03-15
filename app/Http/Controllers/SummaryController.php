<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

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
        {
            $token = csrf_token();
            $orders = Order::where('created_by','=',$token)->get();    
        }   
        return view('summary',['orders'=>$orders]);
    }
}
