@extends('layouts.app')

@section('title', 'Transaction history')

@section('content')
    <h2 class="mb-4">Transaction history</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>From</th>
            <th>To</th>
            <th>Amount (€)</th>
            <th>Status</th>
            <th>Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($transactions as $transaction)
            <tr>
                <td>{{ $transaction->fromAccount->owner_name }}</td>
                <td>{{ $transaction->toAccount->owner_name }}</td>
                <td>{{ number_format($transaction->amount, 2, ',', '.') }} €</td>
                <td>
                    <span class="badge {{ $transaction->status === 'completed' ? 'bg-success' : 'bg-warning' }}">
                        {{ ucfirst($transaction->status) }}
                    </span>
                </td>
                <td>{{ $transaction->created_at->format('d.m.Y H:i') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{ route('transactions.create') }}" class="btn btn-primary">Create New transaction</a>
@endsection
