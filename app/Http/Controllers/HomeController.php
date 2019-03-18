<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
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
        return view('welcome');
    }
    public function getData()
    {
        if(Auth::user())
            $created_by = Auth::user()->id;
        else
            $created_by = csrf_token();
        $data = Order::where('created_by','=',$created_by)->get();
        $quantity = 0;
        $total = 0;
        for($i = 0; $i < count($data); $i ++)
        {
            $quantity += $data[$i]['quantity'];
            $total += $data[$i]['total'];
        }
        return ['quantity' => $quantity, 'total' => $total];
    }
    
}
