@extends('layout')

@section('title', 'Dashboard')
@section('header', 'Active Users Dashboard')

@section('content')
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Anzahl Beiträge</th>
            <th>Letzter Beitrag</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->post_count }}</td>
                <td>{{ $user->last_post_date ?? 'No posts' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
