@extends('layout')
@section('content')
    <h1>Alle Posts</h1>
    <a href="{{ route('posts.create') }}">Neuen Post anlegen</a>
    <ul>
        @foreach($posts as $post)
            <li>{{ $post->title }}</li>
        @endforeach
    </ul>
@endsection