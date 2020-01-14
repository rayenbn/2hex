<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Order, GripTape, Session};
use Illuminate\Support\Facades\Auth;
use App\Jobs\RecalculateOrders;
use App\Models\Wheel\Wheel;

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
            $path = public_path('uploads/' .  Auth::user()->name . '/' . $value);
            if(\File::exists($path)) {
                $filesInFolder = \File::files($path);

                foreach($filesInFolder as $filepath) { 
                      $file = pathinfo($filepath);
                      $filenames[$value][] = $file['filename'] . '.' . $file['extension'] ;
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

        Session::insert(['action' => 'Save Order', 'created_by' => auth()->check() ? auth()->id() : csrf_token(), 'comment' => $data['id'], 'created_at' => date("Y-m-d H:i:s")]);

        dispatch(
            new RecalculateOrders(
                Order::auth()->get(), 
                GripTape::auth()->get(),
                Wheel::auth()->where('submit', 0)->get()
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

                Session::insert(['action' => 'Upload', 'created_by' => Auth::user()->id, 'comment' => $name, 'created_at' => date("Y-m-d H:i:s")]);

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
            $path = public_path('uploads/' .  Auth::user()->name . '/' . $value);
            if(\File::exists($path)) {
                $filesInFolder = \File::files($path);

                foreach($filesInFolder as $filepath) { 
                      $file = pathinfo($filepath);
                      $filenames[$value][] = $file['filename'] . '.' . $file['extension'] ;
                } 
            }
        }

        return view('configurator', compact('saved_order', 'filenames'));
    }

    public function save($id){
        Order::where('id',$id)->update(['saved_batch' => 1]);
        Session::insert(['action' => 'Save Order to Batch', 'created_by' => auth()->check() ? auth()->id() : csrf_token(), 'comment' => $id, 'created_at' => date("Y-m-d H:i:s")]);
        return redirect()->back();
    }
    
    public function delete($id)
    {
        Order::where('id','=',$id)->delete();

        Session::insert(['action' => 'Delete Order', 'created_by' => auth()->check() ? auth()->id() : csrf_token(), 'comment' => $id, 'created_at' => date("Y-m-d H:i:s")]);

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
