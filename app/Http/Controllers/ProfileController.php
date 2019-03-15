<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShipInfo;

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
        return view('profile');
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
}
