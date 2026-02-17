<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function index(): string
    {
        return "Displaying a list of all blog posts.";
    }

    public function create(): string
    {
        return "Showing the form to create a new blog post.";
    }

    public function store(Request $request): string
    {
        return "Storing the new blog post.";
    }

    public function show(string $id): string
    {
        return "Displaying the blog post with ID: $id";
    }

    public function edit(string $id): string
    {
        return "Showing the form to edit blog post with ID: $id";
    }

    public function update(Request $request, string $id): string
    {
        return "Updating the blog post with ID: $id";
    }

    public function destroy(string $id): string
    {
        return "Deleting the blog post with ID: $id";
    }
}
