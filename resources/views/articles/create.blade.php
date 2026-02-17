@extends('layout')
@section('content')
    <h1>Neuen Artikel anlegen</h1>
    <form method="POST" action="{{ route('articles.store') }}">
        @csrf
        <input type="text" name="title" placeholder="Titel" required>
        <textarea name="content" placeholder="Inhalt" required></textarea>
        <button type="submit">Speichern</button>
    </form>
@endsection