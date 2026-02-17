{{-- resources/views/posts/create.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>Add New Article</h1>
    {{-- Form to create a new article --}}
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        {{-- Input for article title --}}
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
            @error('title')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <br>
        {{-- Textarea for article content --}}
        <div>
            <label for="content">Content:</label>
            <textarea id="content" name="content" rows="5" required>{{ old('content') }}</textarea>
            @error('content')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <br>
        {{-- Submit button --}}
        <button type="submit">Save Article</button>
    </form>
@endsection
