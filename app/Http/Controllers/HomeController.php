<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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
        return view('welcome');
    }
    public function inquiries()
    {
        return view('inquiries');   
    }
    public function profile()
    {
        return view('profile');   
    }
    public function configurator()
    {
        return view('configurator');   
    }
    public function summary()
    {
        return view('summary');
    }
    
}
