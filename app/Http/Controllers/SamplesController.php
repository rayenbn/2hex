<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;

class SamplesController extends Controller
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
        return view('samples');
    }
    public function newsletter()
    {
        return view('newsletter');
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
    public function mouseClicked()
    {
        Session::insert(['action' => Session\Enum\Type::CLICKED, 'created_by' => auth()->check() ? auth()->id() : csrf_token(), 'comment' => 'user click', 'created_at' => date("Y-m-d H:i:s")]);
        return response('success');
    }
    
}
