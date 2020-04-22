<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Collection;
use App\Models\Wheel\Wheel;
use App\Models\{Order, GripTape, Session, Bearing};
use App\Jobs\RecalculateOrders;
use App\Models\PaidFile;
class BearingController extends Controller
{
	/**
	 * Show breaing manufacturer page
	 *
	 * @return View
	 */
    public function manufacturer() : View
    {
        return view('bearing-configurator.manufacturer');
    }

    /**
	 * Show breaing configurator page
	 *
	 * @return View
	 */
    public function configurator() : View
    {
        // $filenames = [
        //     'wheel-shape'     => [],
        //     'wheel-front'     => [],
        //     'wheel-back'      => [],
        //     'wheel-cardboard' => [],
        //     'wheel-carton'    => [],
        // ];

        // $user = auth()->user();

        // if (empty($user)) {
        //     return view('wheel-configurator.configurator', compact('filenames'));
        // }

        // $path = '';
        
        // foreach (array_keys($filenames) as $value) {
        //     $count = 0;
        //     $path = public_path('uploads/' .  auth()->user()->name . '/' . $value);
        //     if(\File::exists($path)) {
        //         $filesInFolder = \File::files($path);

        //         foreach($filesInFolder as $filepath) { 
        //               $file = pathinfo($filepath);
        //               $filenames[$value][$count] = [];
        //               $filenames[$value][$count]['name'] = $file['filename'] . '.' . $file['extension'] ;
        //               $filenames[$value][$count]['is_disable'] = false;
        //               $filenames[$value][$count]['color_qty'] = '';
        //               $filenames[$value][$count]['paid'] = false;
        //               $filenames[$value][$count]['paid_date'] = '';
        //               $fileaction = PaidFile::where('created_by', auth()->id())->where('file_name', $filenames[$value][$count]['name'])->first();
        //               if($fileaction != null){
                          
                          
        //                 $filenames[$value][$count]['paid'] = !empty($fileaction['date']);
        //                 $filenames[$value][$count]['color_qty'] = empty($fileaction['color_qty'])?'':$fileaction['color_qty']==4?'CMYK':$fileaction['color_qty'].' color';
        //                 $wheels = empty($fileaction['selected_orders'])?[]:json_decode($fileaction['selected_orders'])->wheel;
        //                 $filenames[$value][$count]['paid_date'] = $fileaction['date'];
        //                 $filenames[$value][$count]['is_disable'] = $filenames[$value][$count]['color_qty']?true:false;
        //               }
        //               $count ++;
        //         } 
        //     }
        // }

        // return view('wheel-configurator.configurator', compact('filenames'));
        return view('bearing-configurator.configurator');
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
        if(empty($data['id']))
            $bearing =  Bearing::query()->create($payload);
        else{
            $bearing = Bearing::query()->whereKey($id)->firstOrFail();
            $bearing->update($payload);
        }
            
        
        
        Session::insert(['action' => Session\Enum\Type::SAVE_BEARING, 'created_by' => auth()->check() ? auth()->id() : csrf_token(), 'comment' => $bearing->id, 'created_at' => date("Y-m-d H:i:s")]);
        dispatch(
            new RecalculateOrders(
                Order::auth()->where('submit', 0)->get(), 
                GripTape::auth()->where('submit', 0)->get(),
                Wheel::auth()->where('submit', 0)->get(),
                Bearing::auth()->where('submit', 0)->get()
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
    public function updateConfigurator(Request $request, int $id)
    {
        $payload = $request->all();

        $bearing = Bearing::query()->whereKey($id)->firstOrFail();

        $bearing->update($payload);

        Session::insert(['action' => Session\Enum\Type::SAVE_BEARING, 'created_by' => auth()->check() ? auth()->id() : csrf_token(), 'comment' => $bearing['id'], 'created_at' => date("Y-m-d H:i:s")]);

        dispatch(
            new RecalculateOrders(
                Order::auth()->where('submit', 0)->get(), 
                GripTape::auth()->where('submit', 0)->get(),
                Wheel::auth()->where('submit', 0)->get(),
                Bearing::auth()->where('submit', 0)->get()
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
    public function show(int $id) : View
    {
        /** @var Wheel $wheel*/
        $bearing = Bearing::find($id);

        $filenames = [
            'race'     => [],
            'shieldbrand'     => [],
            'pantone'      => []
        ];

        $user = auth()->user();

        if (empty($user)) {
            return view('bearing-configurator.configurator', compact('bearing', 'filenames'));
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
                        $bearing = empty($fileaction['selected_orders'])?[]:json_decode($fileaction['selected_orders'])->wheel;
                        $filenames[$value][$count]['paid_date'] = $fileaction['date'];
                        $filenames[$value][$count]['is_disable'] = $filenames[$value][$count]['color_qty']?true:false;
                      }
                      $count ++;
                } 
            }
        }

        return view('bearing-configurator.configurator', compact('bearing', 'filenames'));
    }
    public function save($id){
        //Wheel::where('wheel_id',$id)->update(['saved_batch' => 1]);
        $bearings = Bearing::where('id',$id)->first();
        unset($bearings['id']);
        unset($bearings['saved_date']);
        $bearings['usenow'] = 0;
        unset($bearings['invoice_number']);
        unset($bearings['submit']);
        $bearings['saved_batch'] = 1;
        $array = json_decode(json_encode($bearings), true);
        Bearing::insert($array);
        Session::insert(['action' => Session\Enum\Type::SAVE_BEARING_BATCH, 'created_by' => auth()->check() ? auth()->id() : csrf_token(), 'comment' => $id, 'created_at' => date("Y-m-d H:i:s")]);
        return redirect()->route('profile', ['#saved_orders']);
    }
    public function destroy(int $id)
    {
        Bearing::find($id)->delete();
        Session::insert(['action' => Session\Enum\Type::DELETE_BEARING, 'created_by' => auth()->check() ? auth()->id() : csrf_token(), 'comment' => $id, 'created_at' => date("Y-m-d H:i:s")]);
        dispatch(
            new RecalculateOrders(
                Order::auth()->where('submit', 0)->get(), 
                GripTape::auth()->where('submit', 0)->get(),
                Wheel::auth()->where('submit', 0)->get(),
                Bearing::auth()->where('submit', 0)->get()
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
        $bearing = Bearing::query()->find($id);

        $cloneBearing = $bearing->replicate();
        $cloneBearing->push();

        dispatch(
            new RecalculateOrders(
                Order::auth()->where('submit', 0)->get(), 
                GripTape::auth()->where('submit', 0)->get(),
                Wheel::auth()->where('submit', 0)->get(),
                Bearing::auth()->where('submit', 0)->get()
            )
        );

        return redirect()->route('summary');
    }
}
