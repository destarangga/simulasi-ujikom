<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Product;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::all();
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $products = Product::all();
        return view('sales.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|numeric|min:1',
        ]);

        // Assuming you have the logic to calculate total price based on quantity and product price
        $product = Product::findOrFail($request->product_id);
        $product->decrement('stock', $request->quantity);

        $totalPrice = $request->quantity * $product->price;

        Sale::create([
            'customer_id' => $request->customer_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
            // Assuming you have a 'date' field in your sales table
            'date' => now(), // Or use Carbon to format the date as needed
        ]);

        return redirect()->route('sales.index')->with('success', 'Sale created successfully.');
    }

    public function edit(Sale $sale)
    {
        $products = Product::all();
        return view('sales.edit', compact('sale', 'products'));
    }

    public function update(Request $request, Sale $sale)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|numeric|min:1',
        ]);

        // Assuming you have the logic to calculate total price based on quantity and product price
        $product = Product::findOrFail($request->product_id);
        $totalPrice = $request->quantity * $product->price;

        $sale->update([
            'customer_id' => $request->customer_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
            // Assuming you have a 'date' field in your sales table
            'date' => now(), // Or use Carbon to format the date as needed
        ]);

        return redirect()->route('sales.index')->with('success', 'Sale updated successfully.');
    }

    public function destroy(Sale $sale)
    {
        $sale->delete();

        return redirect()->route('sales.index')->with('success', 'Sale deleted successfully.');
    }
}
