<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = \App\Models\Post::with(['user', 'tags'])->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = \App\Models\Tag::all();
        return view('posts.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'tags' => 'array',
        ]);
        $user = \App\Models\User::first();
        if (!$user) {
            return redirect()->route('posts.create')->withErrors('Kein Benutzer vorhanden!');
        }
        $post = \App\Models\Post::create([
            'user_id' => $user->id,
            'title' => $request->title,
            'content' => $request->content,
        ]);
        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        }
        return redirect()->route('posts.index')->with('success', 'Beitrag erfolgreich erstellt!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
