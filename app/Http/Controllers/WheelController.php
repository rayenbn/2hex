<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Collection;
use App\Models\Wheel\Wheel;
use App\Models\{Order, GripTape, Session};
use App\Jobs\RecalculateOrders;

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
        $filenames = [
            'wheel-shape'     => [],
            'wheel-front'     => [],
            'wheel-back'      => [],
            'wheel-cardboard' => [],
            'wheel-carton'    => [],
        ];

        $user = auth()->user();

        if (empty($user)) {
            return view('wheel-configurator.configurator', compact('filenames'));
        }

        $path = '';
        
        foreach (array_keys($filenames) as $value) {
            $path = public_path('uploads/' .  $user->name . '/' . $value);

            if(\File::exists($path)) {
                $filesInFolder = \File::files($path);

                foreach($filesInFolder as $filepath) { 
                      $file = pathinfo($filepath);
                      $filenames[$value][] = $file['filename'] . '.' . $file['extension'] ;
                } 
            }
        }

        return view('wheel-configurator.configurator', compact('filenames'));
    }

    /**
	 * Store new configurator
	 *
	 * @return 
	 */
    public function storeConfigurator(Request $request)
    {
    	$payload = $request->all();
        $payload['saved_batch'] = 0;
        $wheel =  Wheel::query()->create($payload);
        
        Session::insert(['action' => 'Save Wheel', 'created_by' => auth()->check() ? auth()->id() : csrf_token(), 'comment' => $wheel->id, 'created_at' => date("Y-m-d H:i:s")]);
        dispatch(
            new RecalculateOrders(
                Order::auth()->where('submit', 0)->get(), 
                GripTape::auth()->where('submit', 0)->get(),
                Wheel::auth()->where('submit', 0)->get()
            )
        );

        return redirect()->route('summary');
    }

    /**
     * Update configurator by id
     *
     * @param int $wheelId Identifier of the configurator
     * @param Request $request
     *
     * @return View
     */
    public function updateConfigurator(Request $request, int $wheelId)
    {
        $payload = $request->all();

        $wheel = Wheel::query()->whereKey($wheelId)->firstOrFail();

        $wheel->update($payload);

        Session::insert(['action' => 'Update Wheel', 'created_by' => auth()->check() ? auth()->id() : csrf_token(), 'comment' => $wheel['id'], 'created_at' => date("Y-m-d H:i:s")]);

        dispatch(
            new RecalculateOrders(
                Order::auth()->where('submit', 0)->get(), 
                GripTape::auth()->where('submit', 0)->get(),
                Wheel::auth()->where('submit', 0)->get()
            )
        );

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

        $filenames = [
            'wheel-shape'     => [],
            'wheel-front'     => [],
            'wheel-back'      => [],
            'wheel-cardboard' => [],
            'wheel-carton'    => [],
        ];

        $user = auth()->user();

        if (empty($user)) {
            return view('wheel-configurator.configurator', compact('wheel', 'filenames'));
        }

        $path = '';
        
        foreach (array_keys($filenames) as $value) {
            $path = public_path('uploads/' .  $user->name . '/' . $value);

            if(\File::exists($path)) {
                $filesInFolder = \File::files($path);

                foreach($filesInFolder as $filepath) { 
                      $file = pathinfo($filepath);
                      $filenames[$value][] = $file['filename'] . '.' . $file['extension'] ;
                } 
            }
        }

        return view('wheel-configurator.configurator', compact('wheel', 'filenames'));
    }
    public function save($id){
        Wheel::where('wheel_id',$id)->update(['saved_batch' => 1]);
        Session::insert(['action' => 'Save Wheel To Batch', 'created_by' => auth()->check() ? auth()->id() : csrf_token(), 'comment' => $id, 'created_at' => date("Y-m-d H:i:s")]);
        return redirect()->back();
    }
    public function destroy(int $id)
    {
        Wheel::find($id)->delete();
        Session::insert(['action' => 'Delete Wheel', 'created_by' => auth()->check() ? auth()->id() : csrf_token(), 'comment' => $id, 'created_at' => date("Y-m-d H:i:s")]);
        dispatch(
            new RecalculateOrders(
                Order::auth()->get(), 
                GripTape::auth()->get(),
                Wheel::auth()->where('submit', 0)->get()
            )
        );  

        return redirect()->route('summary');
    }

    /**
     * Copy Wheel by id
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function copy(int $id) : \Illuminate\Http\RedirectResponse
    {
        $wheel = Wheel::query()->find($id);

        $cloneWhhel = $wheel->replicate();
        $cloneWhhel->push();

        return redirect()->route('summary');
    }
}
