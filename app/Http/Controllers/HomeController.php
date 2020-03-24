<?php

namespace App\Http\Controllers;

use App\Models\Order;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('welcome');
    }

    public function getData()
    {
        $data = Order::auth()->get();
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
