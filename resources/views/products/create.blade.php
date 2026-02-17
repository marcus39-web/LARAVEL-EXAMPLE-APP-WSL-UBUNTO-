@extends('layouts.app')

@section('title', 'Add new product')
@section('header', 'Create product')

@section('content')
    @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <label for="name">Product name</label>
        <input type="text" id="name" name="name" required>

        <label for="sku">Article number (SKU)</label>
        <input type="text" id="sku" name="sku" required>

        <label for="price">Price (€)</label>
        <input type="number" id="price" name="price" step="0.01" required>

        <label for="available">Available</label>
        <select id="available" name="available" required>
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>

        <button type="submit">Save product</button>
    </form>
@endsection
