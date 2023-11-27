<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class PostController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:post-list|post-create|post-edit|post-delete', ['only' => ['index','show']]);
        $this->middleware('permission:post-create', ['only' => ['create','store']]);
        $this->middleware('permission:post-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:post-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */



    public function index_admin()
    {
        $posts = Post::latest()->get();
        return view('admin.blogs.index',compact('posts'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'titre' => 'required|min:3|max:50|string',
            'sujet' => 'required|string',
            // 'images'=> 'image'|'max:1024',
        ]);

        Post::create([
            'titre' => $request->titre,
            'sujet' => $request->sujet,
            'images' => $request->hasFile('images') ? $request->file('images')->store('images_blogs', 'public') : null,
        ]);

        Flashy::message('Le post est ajouté avec succès');
        return redirect(route('admin.blog.index'));
    }

    /**
     * Display the specified resource.
     */
    



    public function show_admin(Post $post)
    {
        return view('blogs.show', compact('post'));
    }



    public function update(Request $request, Post $post)
    {
        $this->validate($request,[
            'titre' => 'required|min:3|max:50|string',
            'sujet' => 'required|string',
            'image' => 'string'
        ]);

        $post->update([
            'titre' => $request->titre,
            'sujet' => $request->sujet,
            'images' => $request->hasFile('images') ? $request->file('images')->store('images_blogs', 'public') : null,
        ]);

        Flashy::message('Le post est mise à jour avec succès');
        return view('blogs.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        Flashy::message('Le post est supprimé avec succès');
        return redirect(route('admin.blog.index'));
    }
}