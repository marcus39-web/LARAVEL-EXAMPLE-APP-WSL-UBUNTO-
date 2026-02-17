<!-- Dashboard: User und Beiträge Übersicht -->
@extends('layout')

@section('content')
    <h1>Benutzerübersicht</h1>
    <ul>
        @foreach($users as $user)
            <li>
                <strong>{{ $user->name }}</strong> ({{ $user->email }})
                <ul>
                    @foreach($user->posts as $post)
                        <li>{{ $post->title }}</li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
    @if($users->isEmpty())
        <p>Keine aktiven Nutzer gefunden.</p>
    @endif
@endsection
