<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Collection;
use App\Models\Wheel\Wheel;
use App\Models\{Order, GripTape, Session};
use App\Jobs\RecalculateOrders;
use App\Models\PaidFile;
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
            $count = 0;
            $path = public_path('uploads/' .  auth()->user()->name . '/' . $value);
            if(\File::exists($path)) {
                $filesInFolder = \File::files($path);

                foreach($filesInFolder as $filepath) { 
                      $file = pathinfo($filepath);
                      $filenames[$value][$count] = [];
                      $filenames[$value][$count]['name'] = $file['filename'] . '.' . $file['extension'] ;
                      $filenames[$value][$count]['is_disable'] = false;
                      $filenames[$value][$count]['color_qty'] = '';
                      $filenames[$value][$count]['paid'] = false;
                      $filenames[$value][$count]['paid_date'] = '';
                      $fileaction = PaidFile::where('created_by', auth()->id())->where('file_name', $filenames[$value][$count]['name'])->first();
                      if($fileaction != null){
                          
                          
                        $filenames[$value][$count]['paid'] = !empty($fileaction['date']);
                        $filenames[$value][$count]['color_qty'] = empty($fileaction['color_qty'])?'':$fileaction['color_qty']==4?'CMYK':$fileaction['color_qty'].' color';
                        $wheels = empty($fileaction['selected_orders'])?[]:json_decode($fileaction['selected_orders'])->wheel;
                        $filenames[$value][$count]['paid_date'] = $fileaction['date'];
                        $filenames[$value][$count]['is_disable'] = $filenames[$value][$count]['color_qty']?true:false;
                      }
                      $count ++;
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
        
        Session::insert(['action' => Session\Enum\Type::SAVE_WHEEL, 'created_by' => auth()->check() ? auth()->id() : csrf_token(), 'comment' => $wheel->wheel_id, 'created_at' => date("Y-m-d H:i:s")]);
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

        Session::insert(['action' => Session\Enum\Type::UPDATE_WHEEL, 'created_by' => auth()->check() ? auth()->id() : csrf_token(), 'comment' => $wheel['wheel_id'], 'created_at' => date("Y-m-d H:i:s")]);

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
            $count = 0;
            $path = public_path('uploads/' .  auth()->user()->name . '/' . $value);
            if(\File::exists($path)) {
                $filesInFolder = \File::files($path);

                foreach($filesInFolder as $filepath) { 
                      $file = pathinfo($filepath);
                      $filenames[$value][$count] = [];
                      $filenames[$value][$count]['name'] = $file['filename'] . '.' . $file['extension'] ;
                      $filenames[$value][$count]['is_disable'] = false;
                      $filenames[$value][$count]['color_qty'] = '';
                      $filenames[$value][$count]['paid'] = false;
                      $filenames[$value][$count]['paid_date'] = '';
                      $fileaction = PaidFile::where('created_by', auth()->id())->where('file_name', $filenames[$value][$count]['name'])->first();
                      if($fileaction != null){
                          
                          
                        $filenames[$value][$count]['paid'] = !empty($fileaction['date']);
                        $filenames[$value][$count]['color_qty'] = empty($fileaction['color_qty'])?'':$fileaction['color_qty']==4?'CMYK':$fileaction['color_qty'].' color';
                        $wheels = empty($fileaction['selected_orders'])?[]:json_decode($fileaction['selected_orders'])->wheel;
                        $filenames[$value][$count]['paid_date'] = $fileaction['date'];
                        $filenames[$value][$count]['is_disable'] = $filenames[$value][$count]['color_qty']?true:false;
                      }
                      $count ++;
                } 
            }
        }

        return view('wheel-configurator.configurator', compact('wheel', 'filenames'));
    }
    public function save($id){
        //Wheel::where('wheel_id',$id)->update(['saved_batch' => 1]);
        $wheels = Wheel::where('wheel_id',$id)->first();
        unset($wheels['wheel_id']);
        unset($wheels['saved_date']);
        $wheels['usenow'] = 0;
        unset($wheels['invoice_number']);
        unset($wheels['submit']);
        $wheels['saved_batch'] = 1;
        $array = json_decode(json_encode($wheels), true);
        Wheel::insert($array);
        Session::insert(['action' => Session\Enum\Type::SAVE_WHEEL_BATCH, 'created_by' => auth()->check() ? auth()->id() : csrf_token(), 'comment' => $id, 'created_at' => date("Y-m-d H:i:s")]);
        return redirect()->route('profile', ['#saved_orders']);
    }
    public function destroy(int $id)
    {
        Wheel::find($id)->delete();
        Session::insert(['action' => Session\Enum\Type::DELETE_WHEEL, 'created_by' => auth()->check() ? auth()->id() : csrf_token(), 'comment' => $id, 'created_at' => date("Y-m-d H:i:s")]);
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
