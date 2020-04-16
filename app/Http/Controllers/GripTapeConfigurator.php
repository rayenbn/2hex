<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{GripTape, Order, Session, Bearing};
use App\Jobs\RecalculateOrders;
use App\Models\Wheel\Wheel;
use App\Models\PaidFile;

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

                        $grips = empty($fileaction['selected_orders'])?[]:json_decode($fileaction['selected_orders'])->grip;
                        $filenames[$value][$count]['paid_date'] = $fileaction['date'];
                        $filenames[$value][$count]['is_disable'] = $filenames[$value][$count]['color_qty']?true:false;
                      }
                      $count ++;
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
        foreach (['bottom', 'top', 'engravery', 'cardboard', 'box'] as $value) {
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
                      $fileaction = PaidFile::where('created_by', auth()->id())->where('file_name', $filenames[$value][$count]['name'])->first();
                      if($fileaction != null){
                          
                          
                        $filenames[$value][$count]['paid'] = !empty($fileaction['date']);
                        $filenames[$value][$count]['color_qty'] = empty($fileaction['color_qty'])?'':$fileaction['color_qty']==4?'CMYK':$fileaction['color_qty'].' color';
                        
                        $grips = empty($fileaction['selected_orders'])?[]:json_decode($fileaction['selected_orders'])->grip;
                        $filenames[$value][$count]['paid_date'] = $fileaction['date'];
                        $filenames[$value][$count]['is_disable'] = $filenames[$value][$count]['color_qty']?true:false;
                      }
                      $count ++;
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
        $data['saved_batch'] = 0;
        if(empty($data['id'])){
            $data['id'] = GripTape::query()->create(array_except($data, ['id']))->id;
        } else {
            GripTape::where('id','=', $data['id'])->update($data);
        }

        Session::insert(['action' => Session\Enum\Type::SAVE_GRIP, 'created_by' => auth()->check() ? auth()->id() : csrf_token(), 'comment' => $data['id'], 'created_at' => date("Y-m-d H:i:s")]);

        dispatch(
            new RecalculateOrders(
                Order::auth()->where('submit', 0)->get(), 
                GripTape::auth()->where('submit', 0)->get(),
                Wheel::auth()->where('submit', 0)->get(),
                Bearing::auth()->where('submit', 0)->get()
            )
        );
    }
    public function save($id)
    {
        //GripTape::where('id',$id)->update(['saved_batch' => 1]);

        $grips = GripTape::where('id',$id)->first();
        unset($grips['id']);
        unset($grips['saved_date']);
        $grips['usenow'] = 0;
        unset($grips['invoice_number']);
        unset($grips['submit']);
        $grips['saved_batch'] = 1;
        $array = json_decode(json_encode($grips), true);
        GripTape::insert($array);
        Session::insert(['action' => Session\Enum\Type::SAVE_GRIP_BATCH, 'created_by' => auth()->check() ? auth()->id() : csrf_token(), 'comment' => $id, 'created_at' => date("Y-m-d H:i:s")]);
        return redirect()->route('profile', ['#saved_orders']);
    }
    public function destroy($id)
    {
        GripTape::where('id','=',$id)->delete();
        Session::insert(['action' => Session\Enum\Type::DELETE_GRIP, 'created_by' => auth()->check() ? auth()->id() : csrf_token(), 'comment' => $id, 'created_at' => date("Y-m-d H:i:s")]);
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
