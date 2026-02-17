@extends('layout')
@section('content')
    <h1>Alle User</h1>
    <a href="{{ route('users.create') }}">Neuen User anlegen</a>
    <ul>
        @foreach($users as $user)
            <li>{{ $user->name }} ({{ $user->email }})</li>
        @endforeach
    </ul>
@endsection