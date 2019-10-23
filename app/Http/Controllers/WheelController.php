<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Collection;
use App\Models\Wheel\Wheel;

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

    /**
	 * Store new configurator
	 *
	 * @return 
	 */
    public function storeConfigurator(Request $request)
    {
    	$payload = $request->all();

    	$wheel =  Wheel::query()->create($payload);

        return redirect()->route('summary');
    }

    /**    
     * Show wheel by id
     *
     * @param int $wheelId Identifier of the Wheel
     *
     * @return View
     */
    public function show(int $wheelId) : View
    {
        /** @var Wheel $wheel*/
        $wheel = Wheel::query()->whereKey($wheelId)->first();

        return view('wheel-configurator.configurator', compact('wheel'));
    }
}
