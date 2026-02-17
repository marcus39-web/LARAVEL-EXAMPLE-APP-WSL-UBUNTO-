@extends('layout')
@section('content')
    <h1>Neuen Beitrag anlegen</h1>
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <input type="text" name="title" placeholder="Titel" required><br>
        <textarea name="content" placeholder="Inhalt" required></textarea><br>
        <label>Tags:</label><br>
        @foreach($tags as $tag)
            <input type="checkbox" name="tags[]" value="{{ $tag->id }}"> {{ $tag->name }}<br>
        @endforeach
        <button type="submit">Speichern</button>
    </form>
@endsection