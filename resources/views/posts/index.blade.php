@extends('layout')
@section('content')
    <h1>Alle Beiträge</h1>
    <a href="{{ route('posts.create') }}">Neuen Beitrag anlegen</a>
    <ul>
        @foreach($posts as $post)
            <li>
                <strong>{{ $post->title }}</strong> von {{ $post->user->name ?? 'Unbekannt' }}<br>
                <small>Tags:
                    @foreach($post->tags as $tag)
                        <span>{{ $tag->name }}</span>@if(!$loop->last), @endif
                    @endforeach
                </small>
            </li>
        @endforeach
    </ul>
@endsection