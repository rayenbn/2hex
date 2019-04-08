<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShipInfo;
use Illuminate\Support\Facades\Auth;
use App\Models\Auth\User\User;
use App\Models\Order;

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
            ->groupBy('saved_date', 'invoice_number')
            ->whereNotNull('saved_date')
            ->select('saved_date');

        $querySubmitOrders = clone $queryOrders;

        $orders = $queryOrders->where('submit', 0)->get();
        $submitorders = $querySubmitOrders->where('submit', 1)->addSelect('invoice_number')->get();

        $shipinfo = ShipInfo::auth()->first();

        return view('profile', compact('orders', 'submitorders', 'shipinfo'));
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
