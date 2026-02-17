<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Shows the list of all products.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Displays the form for creating a product.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Saves a new product to the database.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|unique:products,sku|max:50',
            'price' => 'required|numeric|min:0',
            'available' => 'required|boolean',
        ]);
        Product::create($validatedData);
        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }
}
