{{-- resources/views/posts/edit.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>Edit Article</h1>
    {{-- Form to edit an article --}}
    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')
        {{-- Input for article title --}}
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" required>
            @error('title')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <br>
        {{-- Textarea for article content --}}
        <div>
            <label for="content">Content:</label>
            <textarea id="content" name="content" rows="5" required>{{ old('content', $post->content) }}</textarea>
            @error('content')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <br>
        {{-- Submit button --}}
        <button type="submit">Update Article</button>
    </form>
@endsection
