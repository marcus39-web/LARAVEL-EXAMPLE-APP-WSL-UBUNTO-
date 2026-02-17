@extends('layouts.app')

@section('title', 'New transaction')

@section('content')
    <h2 class="mb-4">Perform new transaction</h2>
    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="from_account_id" class="form-label">From Account</label>
            <select class="form-select" id="from_account_id" name="from_account_id" required>
                @foreach ($accounts as $account)
                    <option value="{{ $account->id }}">{{ $account->owner_name }} - {{ $account->balance }} €</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="to_account_id" class="form-label">To Account</label>
            <select class="form-select" id="to_account_id" name="to_account_id" required>
                @foreach ($accounts as $account)
                    <option value="{{ $account->id }}">{{ $account->owner_name }} - {{ $account->balance }} €</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Amount (€)</label>
            <input type="number" class="form-control" id="amount" name="amount" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-success">Transfer</button>
    </form>
@endsection
