<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Order, GripTape, Session, Bearing};
use Illuminate\Support\Facades\Auth;
use App\Jobs\RecalculateOrders;
use App\Models\Wheel\Wheel;
use App\Models\PaidFile;

class ConfiguratorController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filenames = [
            'bottom' => [],
            'top' => [], 
            'engravery' => [],
            'cardboard' => [], 
            'box' => [],
        ];

        if(!auth()->check()) {
            return view('configurator', compact('filenames'));
        }

        $path = '';
        
        foreach (['bottom', 'top', 'engravery', 'cardboard', 'box'] as $value) {
            $count = 0;
            $path = public_path('uploads/' .  Auth::user()->name . '/' . $value);
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

                        $orders = empty($fileaction['selected_orders'])?[]:json_decode($fileaction['selected_orders'])->order;
                        $filenames[$value][$count]['paid_date'] = $fileaction['date'];
                        $filenames[$value][$count]['is_disable'] = $filenames[$value][$count]['color_qty']?true:false;
                      }
                      $count ++;
                } 
            }
        }
        
        return view('configurator', compact('filenames'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $data['submit'] = '0';
        $data['saved_batch'] = 0;
        // $data['created_by'] = auth()->check() ? auth()->id() : csrf_token();
        
        if(empty($data['id'])){
            $data['id'] = Order::query()->create(array_except($data, ['id']))->id;
        } else {
            Order::where('id','=', $data['id'])->update($data);
        }

        Session::insert(['action' => Session\Enum\Type::SAVE_ORDER, 'created_by' => auth()->check() ? auth()->id() : csrf_token(), 'comment' => $data['id'], 'created_at' => date("Y-m-d H:i:s")]);

        dispatch(
            new RecalculateOrders(
                Order::auth()->where('submit', 0)->get(), 
                GripTape::auth()->where('submit', 0)->get(),
                Wheel::auth()->where('submit', 0)->get(),
                Bearing::auth()->where('submit', 0)->get()
            )
        );

        return 'success';
    }

    public function upload(Request $request)
    {
        if($request->hasFile('file')) {
           $file = $request->file('file');

            //you also need to keep file extension as well
            $path = public_path('uploads/' . Auth::user()->name . '/' . $request->get('typeUpload', 'bottom'));
            $name = $request->get('fileName', $file->getClientOriginalName());

            try {
                if(!\File::exists($path)) {
                    \File::makeDirectory($path, $mode = 0777, true, true);
                }

                $file->move($path, $name);

                Session::insert(['action' => Session\Enum\Type::UPLOAD, 'created_by' => Auth::user()->id, 'comment' => $name, 'created_at' => date("Y-m-d H:i:s")]);

                return $name;

            } catch (\Exception $e) {
                return 'failed';
            }

        }
        return 'failed';
    }

    public function show($id)
    {
        $saved_order = Order::find($id);

        $filenames = [
            'bottom' => [],
            'top' => [], 
            'engravery' => [],
            'cardboard' => [], 
            'box' => [],
        ];

        if(!auth()->check()) {
            return view('configurator', compact('filenames', 'saved_order'));
        }

        $path = '';
        foreach (['bottom', 'top', 'engravery', 'cardboard', 'box'] as $value) {
            $count = 0;
            $path = public_path('uploads/' .  Auth::user()->name . '/' . $value);
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
                        
                        $orders = empty($fileaction['selected_orders'])?[]:json_decode($fileaction['selected_orders'])->order;
                        $filenames[$value][$count]['paid_date'] = $fileaction['date'];
                        $filenames[$value][$count]['is_disable'] = $filenames[$value][$count]['color_qty']?true:false;
                      }
                      $count ++;
                } 
            }
        }
        

        return view('configurator', compact('saved_order', 'filenames'));
    }

    public function save($id){
        $orders = Order::where('id',$id)->first();
        unset($orders['id']);
        unset($orders['saved_date']);
        unset($orders['invoice_number']);
        $orders['usenow'] = 0;
        unset($orders['submit']);
        $orders['saved_batch'] = 1;
        $array = json_decode(json_encode($orders), true);
        Order::insert($array);
        Session::insert(['action' => Session\Enum\Type::SAVE_ORDER_BATCH, 'created_by' => auth()->check() ? auth()->id() : csrf_token(), 'comment' => $id, 'created_at' => date("Y-m-d H:i:s")]);
        return redirect()->route('profile', ['#saved_orders']);
    }
    
    public function delete($id)
    {
        Order::where('id','=',$id)->delete();

        Session::insert(['action' => Session\Enum\Type::DELETE_ORDER, 'created_by' => auth()->check() ? auth()->id() : csrf_token(), 'comment' => $id, 'created_at' => date("Y-m-d H:i:s")]);

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
     * Copy SB deck by id
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function copy(int $id) : \Illuminate\Http\RedirectResponse
    {
        $deck = Order::query()->find($id);

        $cloneDeck = $deck->replicate();
        $cloneDeck->push();

        return redirect()->route('summary');
    }

}
