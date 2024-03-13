@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Penjualan</div>

                    <div class="card-body">
                        <form action="{{ route('sales.update', $sale->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="customer_id">ID Pelanggan:</label>
                                <input type="text" name="customer_id" id="customer_id" class="form-control" value="{{ $sale->customer_id }}" required>
                            </div>
                            <div class="form-group">
                                <label for="product_id">ID Produk:</label>
                                <input type="text" name="product_id" id="product_id" class="form-control" value="{{ $sale->product_id }}" required>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Kuantitas:</label>
                                <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $sale->quantity }}" required>
                            </div>
                            <div class="form-group">
                                <label for="total_price">Total Harga:</label>
                                <input type="number" name="total_price" id="total_price" class="form-control" value="{{ $sale->total_price }}" required>
                            </div>
                            <div class="form-group">
                                <label for="date">Tanggal Penjualan:</label>
                                <input type="date" name="date" id="date" class="form-control" value="{{ $sale->date }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Perbarui Penjualan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
