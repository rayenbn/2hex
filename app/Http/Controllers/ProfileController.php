<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShipInfo;
use Illuminate\Support\Facades\Auth;
use App\Models\Auth\User\User;

class ProfileController extends Controller
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
        if(Auth::user()){
            $created_by = Auth::user()->id;
        }
        else{
            $created_by = csrf_token();
        }

        $shipinfo = ShipInfo::where('created_by','=',$created_by)->first();
        return view('profile', ['shipinfo'=>$shipinfo]);

    }
    public function store_address(Request $request)
    {
        $data = $request->all();
        if(Auth::user())
            $data['created_by'] = Auth::user()->id;
        else
            $data['created_by'] = csrf_token();

        $origin = ShipInfo::where('created_by','=',$data['created_by'])->get();
        if(count($origin) == 0)
            ShipInfo::insert($data);
        else
            ShipInfo::where('created_by','=',$data['created_by'])->update($data);

        return 'success';
    }
    public function detail_save(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        if(Auth::user())
        {
            $id = Auth::user()->id;
            $user = User::where('id','=',$id)->update($data);
        }
        return redirect()->route('profile');
    }
}
