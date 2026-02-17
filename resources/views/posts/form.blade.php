@extends('layouts.app')

@section('title', $post->exists ? 'Artikel bearbeiten' : 'Neuen Artikel erstellen')
@section('header', $post->exists ? 'Artikel bearbeiten' : 'Neuen Artikel erstellen')

@section('content')
    <form action="{{ $post->exists ? route('posts.update', $post) : route('posts.store') }}" method="POST">
        @csrf
        @if($post->exists)
            @method('PUT')
        @endif
        <label for="title">Titel</label>
        <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" required>
        <label for="content">Inhalt</label>
        <textarea id="content" name="content" required>{{ old('content', $post->content) }}</textarea>
        <button type="submit">{{ $post->exists ? 'Aktualisieren' : 'Erstellen' }}</button>
    </form>
    <a href="{{ route('posts.index') }}">Zurück zur Übersicht</a>
@endsection
