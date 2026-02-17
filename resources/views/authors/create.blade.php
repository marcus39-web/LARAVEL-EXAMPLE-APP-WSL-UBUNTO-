@extends('layout')
@section('content')
    <h1>Neuen Autor anlegen</h1>
    @if ($errors->any())
        <div style="color:red;">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif
    <form method="POST" action="{{ route('authors.store') }}">
        @csrf
        <input type="text" name="name" placeholder="Name" required>
        <button type="submit">Speichern</button>
    </form>
@endsection