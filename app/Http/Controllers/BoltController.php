<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Collection;
use App\Models\Wheel\Wheel;
use App\Models\{Order, GripTape, Session, Bearing, BoltNut};
use App\Jobs\RecalculateOrders;
use App\Models\PaidFile;
class BoltController extends Controller
{
	/**
	 * Show breaing manufacturer page
	 *
	 * @return View
	 */
    public function manufacturer() : View
    {
        return view('bolt-configurator.manufacturer');
    }

    /**
	 * Show breaing configurator page
	 *
	 * @return View
	 */
    public function configurator() : View
    {
        $filenames = [
            'pack'     => []
        ];

        $user = auth()->user();

        if (empty($user)) {
            return view('bolt-configurator.configurator', compact('filenames'));
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

        return view('bolt-configurator.configurator', compact('filenames'));
        //return view('bearing-configurator.configurator');
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
            $bolt =  BoltNut::query()->create($payload);
        else{
            $bolt = BoltNut::query()->whereKey($id)->firstOrFail();
            $bolt->update($payload);
        }
            
        
        
        Session::insert(['action' => Session\Enum\Type::SAVE_BOLTNUT, 'created_by' => auth()->check() ? auth()->id() : csrf_token(), 'comment' => $bolt->id, 'created_at' => date("Y-m-d H:i:s")]);
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

        $bolt = BoltNut::query()->whereKey($id)->firstOrFail();

        $bolt->update($payload);

        Session::insert(['action' => Session\Enum\Type::SAVE_BOLTNUT, 'created_by' => auth()->check() ? auth()->id() : csrf_token(), 'comment' => $bolt['id'], 'created_at' => date("Y-m-d H:i:s")]);

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
        $bolt = BoltNut::find($id);

        $filenames = [
            'race'     => [],
            'shieldbrand'     => [],
            'pantone'      => []
        ];

        $user = auth()->user();

        if (empty($user)) {
            return view('bolt-configurator.configurator', compact('bolt', 'filenames'));
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
                        $bolt = empty($fileaction['selected_orders'])?[]:json_decode($fileaction['selected_orders'])->wheel;
                        $filenames[$value][$count]['paid_date'] = $fileaction['date'];
                        $filenames[$value][$count]['is_disable'] = $filenames[$value][$count]['color_qty']?true:false;
                      }
                      $count ++;
                } 
            }
        }

        return view('bolt-configurator.configurator', compact('bolt', 'filenames'));
    }
    public function save($id){
        //Wheel::where('wheel_id',$id)->update(['saved_batch' => 1]);
        $bolts = BoltNut::where('id',$id)->first();
        unset($bolts['id']);
        unset($bolts['saved_date']);
        $bolts['usenow'] = 0;
        unset($bolts['invoice_number']);
        unset($bolts['submit']);
        $bolts['saved_batch'] = 1;
        $array = json_decode(json_encode($bolts), true);
        BoltNut::insert($array);
        Session::insert(['action' => Session\Enum\Type::SAVE_BOLTNUT_BATCH, 'created_by' => auth()->check() ? auth()->id() : csrf_token(), 'comment' => $id, 'created_at' => date("Y-m-d H:i:s")]);
        return redirect()->route('profile', ['#saved_orders']);
    }
    public function destroy(int $id)
    {
        BoltNut::find($id)->delete();
        Session::insert(['action' => Session\Enum\Type::DELETE_BOLTNUT, 'created_by' => auth()->check() ? auth()->id() : csrf_token(), 'comment' => $id, 'created_at' => date("Y-m-d H:i:s")]);
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
        $bolt = BoltNut::query()->find($id);

        $cloneBolt = $bolt->replicate();
        $cloneBolt->push();

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
