<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class ConfiguratorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

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
        if(Auth::user())
             $data['created_by'] = Auth::user()->id;
        else
            $data['created_by'] = csrf_token();
        if($data['id'] == '')
        {
            $data['created_at'] =new \DateTime();
            Order::insert($data);
        }
        else
        {
            Order::where('id','=',$data['id'])->update($data);
        }
       // $request = [ 'quantity' : 30 ];
        
        // var_dump($request);
        // exit();
        return 'success';
    }

    public function upload(Request $request)
    {
        if($request->hasFile('file')) {
           $file = $request->file('file');
           
            //you also need to keep file extension as well
            $path = public_path('uploads/' . Auth::user()->name . '/' . $request->get('typeUpload', 'bottom'));
            $name = $file->getClientOriginalName();

            if(!\File::exists($path)) {
                \File::makeDirectory($path, $mode = 0777, true, true);
            }

            $file->move($path, $name);

           return $name;
        }
        return 'failed';
    }

    public function show($id)
    {
        $data = Order::where('id','=',$id)->get();

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

        return view('configurator', compact('saved_order', 'filenames'));
    }
    
    public function delete($id){
        Order::where('id','=',$id)->delete();        
        return redirect()->route('summary');
    }

}
