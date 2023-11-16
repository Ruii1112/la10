<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(Post $post): View
    {
       return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    public function show(Post $post): View
    {
        return view('posts.show')->with(['post' => $post]);
    }
    
    public function create(): View
    {
        return view('posts.create');
    }
    
    public function store(PostRequest $request, Post $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
}
