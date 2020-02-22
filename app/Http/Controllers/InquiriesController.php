<?php

namespace App\Http\Controllers;
use App\Models\InquiryCompany;
use App\Mail\InquiryCompanyEmail;

use Illuminate\Http\Request;

class InquiriesController extends Controller
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
        return view('inquiries');
    }
    public function submit(Request $request)
    {
        $inputs = $request->all();
        InquiryCompany::insert($inputs);
        \Mail::to('niklas@2hex.com')->send(new InquiryCompanyEmail($inputs));
        return 'success';
    }
}
