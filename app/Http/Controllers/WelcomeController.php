<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $posts = Post::latest()->limit(3)->get();
        return view('welcome', compact('posts'));
    }
}