@extends('layouts.app')

@section('content')
    <h1>Article List</h1>
    {{-- Link to add a new article --}}
    <a href="{{ route('posts.create') }}" style="display: inline-block; margin-bottom: 15px;">
        Add New Article
    </a>
    {{-- Success message --}}
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    {{-- List all articles --}}
    <ul>
        @forelse($posts as $post)
            <li>
                <strong>{{ $post->title }}</strong>: {{ $post->content }}
                {{-- Edit link --}}
                <a href="{{ route('posts.edit', $post) }}">Edit</a>
                {{-- Delete form --}}
                <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this article?')">Delete</button>
                </form>
            </li>
        @empty
            {{-- Message if no articles exist --}}
            <li>No articles found.</li>
        @endforelse
    </ul>
@endsection
