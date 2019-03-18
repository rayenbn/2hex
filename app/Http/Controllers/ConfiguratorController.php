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
        // if(Auth::user()){
        //     $created_by = Auth::user()->id;
        // }
        // else{
        //     $created_by = csrf_token();
        // }
        // $orders = Order::where('created_by','=',$created_by)->where();
        // $totalquantity = 0;
        // $totalprice = 0;
        // for($i = 0; $i < count($orders); $i ++){
        //     $totalquantity += $orders[$i]['quantity'];
        //     $totalprice += $orders[$i]['total'];
        // }

        return view('configurator');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        if(Auth::user())
             $data['created_by'] = Auth::user()->id;
        else
            $data['created_by'] = csrf_token();
        if($data['id'] == '')
        {
            $data['created_at'] =new \DateTime();
            Order::insert($data);
        }
        else
        {
            Order::where('id','=',$data['id'])->update($data);
        }
       // $request = [ 'quantity' : 30 ];
        
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
    public function show($id)
    {
        $data = Order::where('id','=',$id)->get();

        return view('configurator', ['saved_order'=>$data]);
    }
    public function delete($id){
        Order::where('id','=',$id)->delete();        
        return redirect()->route('summary');
    }
}
