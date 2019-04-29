<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Scopes\SearchScope;
use Validator;

class BlogController extends Controller
{
	public function index(Request $request)
    {
    	$posts = Post::query()
    		->withGlobalScope('search', new SearchScope($request))
    		->get();

		return $posts;
    }

    public function show($slug)
    {
        $post = Post::query()
            ->with('author')
            ->where('slug', $slug)
            ->firstOrFail();

    	return view('blog.show', compact('post'));
    } 

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'   => 'required|string',
            'image'   => 'required', 
            'content' => 'required', 
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $validator->getData();

        $data['user_id'] = auth()->id();
        $data['active'] = array_key_exists('active', $data) ? true : false;

        Post::create($data);

        return redirect('/')->with('message', 'You success created new post!');
        
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/')->with('message', 'You success deleted post!');

    }

    public function update(Request $request, Post $post)
    {
        $validator = Validator::make($request->all(), [
            'title'   => 'required|string',
            'image'   => 'required', 
            'content' => 'required', 
            'active'  => 'nullable', 
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $data = $validator->getData();
        $data['active'] = array_key_exists('active', $data) ? true : false;

        $post->update($data);

        return back()->with('message', 'You success updated post!');
    }

    public function edit(Post $post)
    {
        return view('blog.create', compact('post'));
    }
}
