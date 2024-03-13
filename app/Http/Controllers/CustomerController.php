<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'notelp' => 'required',
            'alamat' => 'required',
        ]);

        // Simpan data
        Customer::create($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    public function edit(Customer $customer)
{
    return view('customers.edit', compact('customer'));
}

public function update(Request $request, Customer $customer)
{
    // Validate input
    $request->validate([
        'name' => 'required',
        'notelp' => 'required',
        'alamat' => 'required',
    ]);

    // Update customer data
    $customer->update($request->all());

    return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
}

public function destroy(Customer $customer)
{
    $customer->delete();

    return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
}

    // Tambahkan fungsi edit, update, dan destroy sesuai kebutuhan
}
