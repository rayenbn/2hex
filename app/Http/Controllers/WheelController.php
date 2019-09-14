<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class WheelController extends Controller
{
	/**
	 * Show wheel manufacturer page
	 *
	 * @return View
	 */
    public function manufacturer() : View
    {
        return view('wheel-configurator.manufacturer');
    }

    /**
	 * Show wheel configurator page
	 *
	 * @return View
	 */
    public function configurator() : View
    {
        return view('wheel-configurator.configurator');
    }
}
