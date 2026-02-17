@extends('layout')
@section('content')
    <h1>Alle Artikel</h1>
    <a href="{{ route('articles.create') }}">Neuen Artikel anlegen</a>
    <ul>
        @foreach($articles as $article)
            <li>{{ $article->title }}</li>
        @endforeach
    </ul>
@endsection