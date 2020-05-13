<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Scopes\GapScope;
use Illuminate\Http\Request;

class SbblogController extends Controller
{
    /**
     * Show the blog page.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        /** @var \Illuminate\Database\Eloquent\Collection $posts */
        $posts = Post::query()
            ->withGlobalScope('gap', new GapScope($request))
            ->orderBy('created_at', 'desc')
            ->where('active', true)
            ->with('author')
            ->paginate(4);

        return view('sbblog', compact('posts'));
    }
}
