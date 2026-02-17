@extends('layout')
@section('content')
    <h1>Alle Autoren</h1>
    <a href="{{ route('authors.create') }}">Neuen Autor anlegen</a>
    <ul>
        @foreach($authors as $author)
            <li>{{ $author->name }}</li>
        @endforeach
    </ul>
@endsection