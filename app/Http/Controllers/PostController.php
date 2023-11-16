<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Post;
use App\Models\Category;
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
    
    public function create(Category $category): View
    {
        return view('posts.create')->with(['categories' => $category->get()]);
    }
    
    public function store(PostRequest $request, Post $post): RedirectResponse
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post): View
    {
        return view('posts.edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post): RedirectResponse
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
    
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post): RedirectResponse
    {
        $post->delete();
        return redirect('/');
    }
}
