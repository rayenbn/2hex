<?php

namespace App\Http\Controllers;

use App\Scopes\GapScope;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        /** @var \Illuminate\Database\Eloquent\Collection $posts */
        $posts = Post::query()
            ->withGlobalScope('gap', new GapScope($request))
            ->orderBy('created_at', 'desc')
            ->where('active', true)
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
