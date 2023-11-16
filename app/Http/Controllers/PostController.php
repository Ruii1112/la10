<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(Post $post): View
    {
       return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
    }
}
