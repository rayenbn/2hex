<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

/**
 * Class TransferController
 * @package App\Http\Controllers
 */
class TransferController extends Controller
{
    /**
     * Show manufacturer page
     *
     * @return \Illuminate\View\View
     */
    public function manufacturer() : View
    {
        return view('transfers.manufacturer');
    }

    /**
     * Show configurator page
     *
     * @return \Illuminate\View\View
     */
    public function configurator() : View
    {
        return view('transfers.configurator');
    }
}