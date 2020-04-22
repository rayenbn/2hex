<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\BookSubscribe;
use App\Mail\EmailBook;
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
    public function downBooks(Request $request)
    {
        $email = $request->input('email');
        $fname = $request->input('fname');
        $check = BookSubscribe::where('email',$email)->count();
        if($check > 0){
            session()->flash('error', 'You already submitted your email');
            return redirect()->route('index',['#mc-embedded-subscribe-form']);
        }
        $user = new BookSubscribe;
        $user->email = $email;
        $user->name = $fname;
        $user->save();
        session()->flash('success', 'success');
        // \Mail::to($email)->send(new EmailBook(['id'=>$user->id, 'name' => $fname, 'type' => 1]));
        return redirect()->route('index',['#mc-embedded-subscribe-form']);
    }
}
