<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostUserController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(5);
        return view('blogs.index',compact('posts'));
        // ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function show(Post $post)
    {
        return view('blogs.show', compact('post'));
    }
}