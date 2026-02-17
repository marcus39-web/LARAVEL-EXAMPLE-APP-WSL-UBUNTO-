<?php

namespace App\Http\Controllers;

use App\Models\Post; // Import Post model
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Fetch and display all posts
    public function index()
    {
        // Retrieve all posts from the database
        $posts = Post::all();
        // Pass the posts to the 'index' view
        return view('posts.index', compact('posts'));
    }

    // Show the form for creating a new post
    public function create()
    {
        return view('posts.create');
    }

    // Store a newly created post in the database
    public function store(Request $request)
    {
        // Validate incoming data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        // Insert the validated data into the database
        Post::create($validatedData);
        // Redirect back to the post list with a success message
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    // Show the form for editing an existing post
    public function edit(Post $post)
    {
        // Pass the existing post data to the 'edit' view
        return view('posts.edit', compact('post'));
    }

    // Update an existing post in the database
    public function update(Request $request, Post $post)
    {
        // Validate incoming data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        // Update the existing post with the new data
        $post->update($validatedData);
        // Redirect back to the post list with a success message
        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    // Delete a post from the database
    public function destroy(Post $post)
    {
        // Delete the selected post
        $post->delete();
        // Redirect back to the post list with a success message
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
