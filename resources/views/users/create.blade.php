@extends('layout')
@section('content')
    <h1>Neuen User anlegen</h1>
    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="E-Mail" required>
        <button type="submit">Speichern</button>
    </form>
@endsection