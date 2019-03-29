<?php

namespace App\Exports;

use App\Models\Order;
use App\Models\ShipInfo;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class OrderExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct($created_by="", $save_date="")
    {
        $this->created_by = $created_by;
        $this->saved_date = $save_date;
    }

    public function view(): View
    {
        if($this->saved_date == "")
            return view('items', [
                'orders' => Order::where('created_by','=',$this->created_by)->where('usenow','=',1)->get(),
                'shipinfo' => ShipInfo::where('created_by','=', $this->created_by)->first(),
                'user' => Auth::user()
            ]);
        else
            return view('items', [
                'orders' => Order::where('created_by','=',$this->created_by)->where('saved_date','=',$this->saved_date)->get(),
                'shipinfo' => ShipInfo::where('created_by','=', $this->created_by)->first(),
                'user' => Auth::user()
            ]);
    }
}
