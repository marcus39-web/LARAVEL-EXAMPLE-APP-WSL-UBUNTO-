@extends('layouts.app')

@section('title', 'Product list')
@section('header', 'Product catalog')

@section('content')
    @if (session('success'))
        <div style="color: green; margin-bottom: 20px;">{{ session('success') }}</div>
    @endif
    <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
        <thead>
            <tr>
                <th style="border: 1px solid #ddd; padding: 8px;">Name</th>
                <th style="border: 1px solid #ddd; padding: 8px;">Article number (SKU)</th>
                <th style="border: 1px solid #ddd; padding: 8px;">Price (€)</th>
                <th style="border: 1px solid #ddd; padding: 8px;">Available</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $product->name }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $product->sku }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $product->price }} €</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $product->available ? 'Yes' : 'No' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('products.create') }}" style="text-decoration: none;">
        <button>Add new product</button>
    </a>
@endsection
