<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SaleDetail;

class SaleDetailController extends Controller
{
    public function index()
    {
        $saleDetails = SaleDetail::all();
        return view('sale_details.index', compact('saleDetails'));
    }

    public function create()
    {
        // Logic untuk membuat detail penjualan baru jika diperlukan
    }

    public function store(Request $request)
    {
        // Logic untuk menyimpan detail penjualan baru jika diperlukan
    }

    public function show(SaleDetail $saleDetail)
    {
        return view('sale_details.show', compact('saleDetail'));
    }

    public function edit(SaleDetail $saleDetail)
    {
        // Logic untuk mengedit detail penjualan jika diperlukan
    }

    public function update(Request $request, SaleDetail $saleDetail)
    {
        // Logic untuk memperbarui detail penjualan jika diperlukan
    }

    public function destroy(SaleDetail $saleDetail)
    {
        // Logic untuk menghapus detail penjualan jika diperlukan
    }
}
