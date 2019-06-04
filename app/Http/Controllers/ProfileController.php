<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShipInfo;
use Illuminate\Support\Facades\Auth;
use App\Models\Auth\User\User;
use App\Models\{Order, GripTape};

class ProfileController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $queryOrders = Order::query()
            ->where('created_by', auth()->check() ? auth()->id() : csrf_token())
            ->groupBy('saved_date', 'invoice_number', 'saved_name')
            ->whereNotNull('saved_date')
            ->select(['saved_date', 'saved_name']);

        $queryGrips = GripTape::query()
            ->where('created_by', auth()->check() ? auth()->id() : csrf_token())
            ->groupBy('saved_date', 'invoice_number', 'saved_name')
            ->whereNotNull('saved_date')
            ->select(['saved_date', 'saved_name']);

        $querySubmitOrders = clone $queryOrders;
        $querySubmitGrips = clone $queryGrips;

        $unSubmitOrders = $queryOrders->where('submit', 0)->get();

        $queryGrips->where('submit', 0)->get()->each(function($grip) use (&$unSubmitOrders) {
            $unSubmitOrders->push($grip);
        });

        $submitorders = $querySubmitOrders->where('submit', 1)->addSelect('invoice_number')->get();

        $querySubmitGrips->where('submit', 1)->addSelect('invoice_number')->get()->each(function($grip) use (&$submitorders) {
            $submitorders->push($grip);
        });

        $shipinfo = ShipInfo::auth()->first();

        return view('profile', compact('unSubmitOrders', 'submitorders', 'shipinfo'));
    }

    public function store_address(Request $request)
    {
        $data = $request->all();
        if(Auth::user())
            $data['created_by'] = (string) auth()->id();
        else
            $data['created_by'] = csrf_token();

        $origin = ShipInfo::where('created_by', $data['created_by']);

        if($origin->count() == 0){
            ShipInfo::insert($data);
        } else{
            ShipInfo::where('created_by','=',$data['created_by'])->update($data);
        }

        return redirect()->route('profile');
    }

    public function detail_save(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        if(auth()->check()) {
            $user = User::where('id','=', auth()->id())->update($data);
        }
        
        return redirect()->route('profile');
    }
}
