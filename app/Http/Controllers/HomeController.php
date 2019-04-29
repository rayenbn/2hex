<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::query()
            ->orderBy('created_at', 'desc')
            ->whereActive(true)
            ->with('author')
            ->paginate(4);

        return view('welcome', compact('posts'));
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
