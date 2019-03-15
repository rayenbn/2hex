<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class ConfiguratorController extends Controller
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
        return view('configurator');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        if(Auth::user())
             $data['created_by'] = Auth::user()->id;
        else
            $data['created_by'] = csrf_token();
       // $request = [ 'quantity' : 30 ];
        Order::insert($data);
        // var_dump($request);
        // exit();
        return 'success';
    }
    public function upload(Request $request)
    {
        if($request->hasFile('file')) {
           $file = $request->file('file');
           
           //you also need to keep file extension as well
           $name = uniqid(rand(), true).'.'.$file->getClientOriginalExtension();;
            
           //using the array instead of object
           
           $file->move(public_path().'/uploads/', $name);
           return $name;
        }
        return 'failed';
    }
}
