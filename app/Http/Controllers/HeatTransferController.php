<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HeatTransferController extends Controller
{
    public function manufacturer(): View
    {
        return view('heat-transfer-configurator.manufacturer');
    }

    public function configurator(): View
    {
        $filenames = [];

        return view('heat-transfer-configurator.configurator', compact('filenames'));
    }
}
