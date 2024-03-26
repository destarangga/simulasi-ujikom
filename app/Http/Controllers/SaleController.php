<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Product;
use App\Models\Customer;

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

    public function checkout(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        return view('sales.checkout', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'product' => 'required|exists:products,id',
            'totalPrice' => 'required|numeric|min:0',
        ]);

        $product = Product::findOrFail($request->product);
        $customer = Customer::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        Sale::create([
            'customer_id' => $customer->id,
            'product_id' => $product->id,
            'quantity' => 1, // Assuming each sale is for one product
            'total_price' => $request->totalPrice,
            'date' => now(),
        ]);

        return redirect()->route('sales.checkout')->with('success', 'Sale created successfully.');
    }
}
