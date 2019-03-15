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
        $this->middleware('auth', ['except' => ['index']]);
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
}
