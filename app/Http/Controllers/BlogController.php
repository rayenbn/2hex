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
}
