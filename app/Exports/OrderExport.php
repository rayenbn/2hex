<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;


class OrderExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct($created_by="")
    {
        $this->created_by = $created_by;
    }

    public function view(): View
    {
        return view('items', [
            'orders' => Order::where('created_by','=',$this->created_by)->get()
        ]);
    }
}
