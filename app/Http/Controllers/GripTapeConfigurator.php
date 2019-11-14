<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{GripTape, Order};
use App\Jobs\RecalculateOrders;
use App\Models\Wheel\Wheel;

class GripTapeConfigurator extends Controller
{
	public function index()
    {
    	$filenames = [
            'carton'    => [],
            'backpaper' => [],
            'diecut'    => [],
            'top'       => []
        ];

        if(!auth()->check()) {
            return view('configurator.griptape', compact('filenames'));
        }

        $path = '';
        foreach (array_keys($filenames) as $value) {
            $path = public_path('uploads/' .  auth()->user()->name . '/' . $value);
            if(\File::exists($path)) {
                $filesInFolder = \File::files($path);

                foreach($filesInFolder as $filepath) { 
                      $file = pathinfo($filepath);
                      $filenames[$value][] = $file['filename'] . '.' . $file['extension'] ;
                } 
            }
        }

    	return view('configurator.griptape', compact('filenames'));
    }

    public function show($id)
    {
        $griptape = GripTape::find($id);

        $filenames = [
            'carton'    => [],
            'backpaper' => [],
            'diecut'    => [],
            'top'       => []
        ];

        if(!auth()->check()) {
            return view('configurator.griptape', compact('filenames', 'griptape'));
        }

        $path = '';
        foreach (array_keys($filenames) as $value) {
            $path = public_path('uploads/' .  auth()->user()->name . '/' . $value);
            if(\File::exists($path)) {
                $filesInFolder = \File::files($path);

                foreach($filesInFolder as $filepath) { 
                      $file = pathinfo($filepath);
                      $filenames[$value][] = $file['filename'] . '.' . $file['extension'] ;
                } 
            }
        }

        return view('configurator.griptape', compact('filenames', 'griptape'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'quantity' => 'required',
            'size'     => 'required',
        ]);

        $data = $request->all();

        if(empty($data['id'])){
            GripTape::query()->create(array_except($data, ['id']));
        } else {
            GripTape::where('id','=', $data['id'])->update($data);
        }

        dispatch(
            new RecalculateOrders(
                Order::auth()->get(), 
                GripTape::auth()->get(),
                Wheel::auth()->where('submit', 0)->get()
            )
        );
    }

    public function destroy($id)
    {
        GripTape::where('id','=',$id)->delete();

        dispatch(
            new RecalculateOrders(
                Order::auth()->get(), 
                GripTape::auth()->get(),
                Wheel::auth()->where('submit', 0)->get()
            )
        );  

        return redirect()->route('summary');
    }

    public function manufacturer()
    {
        return view('configurator.manufacturer');
    }

    /**
     * Copy Grip Tape by id
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function copy(int $id) : \Illuminate\Http\RedirectResponse
    {
        $grip = GripTape::query()->find($id);

        $cloneGrip = $grip->replicate();
        $cloneGrip->push();

        return redirect()->route('summary');
    }
}
