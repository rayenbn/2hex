<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Scopes\SearchScope;

class BlogController extends Controller
{
	public function index(Request $request)
    {
    	$posts = Post::query()
    		->withGlobalScope('search', new SearchScope($request))
    		->get();

		return $posts;
    }

    public function show(Post $post)
    {
    	$post->load('author');

    	return view('blog.show', compact('post'));
    } 

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string', 'image' => 'required', 'content' => 'required', 'active' => 'required'
        ]);

        $data['user_id'] = auth()->id();
        $data['slug'] = str_slug($data['title']);
        $data['active'] = $data['active'] == 'on' ? true : false;
        $data['image'] = '/uploads/posts/' . $data['image'];

        Post::create($data);

        return back()->with('message', 'You success created new post!');
        
    }
}
