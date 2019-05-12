<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GripTapeConfigurator extends Controller
{
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
            return view('configurator.griptape', compact('filenames'));
        }

        $path = '';
        foreach (['bottom', 'top', 'engravery', 'cardboard', 'box'] as $value) {
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
}
