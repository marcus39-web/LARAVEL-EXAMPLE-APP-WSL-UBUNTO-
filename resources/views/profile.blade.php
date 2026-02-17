@extends('layout')

@section('title', 'Profil von ' . $name)

@section('content')
    <h2>Profil von {{ $name }}</h2>
    <p>Alter: {{ $age }}</p>
    <p>Biografie: {{ $bio }}</p>
    <h3>Hobbys:</h3>
    <ul>
        @foreach($hobbies as $hobby)
            @include('hobby', ['hobby' => $hobby])
        @endforeach
    </ul>
@endsection
