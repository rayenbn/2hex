<?php

namespace App\Http\Controllers;
use App\Models\InquiryPrivate;
use App\Mail\InquiryPrivateEmail;
use Illuminate\Http\Request;

class InquiriesprivateController extends Controller
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
        return view('inquiriesprivate');
    }
    public function submit(Request $request)
    {
        $inputs = $request->all();
        InquiryPrivate::insert($inputs);
        \Mail::to('niklas@2hex.com')->send(new InquiryPrivateEmail($inputs));
        return 'success';
    }
}
