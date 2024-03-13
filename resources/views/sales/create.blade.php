@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tambah Penjualan</div>

                    <div class="card-body">
                        <form action="{{ route('sales.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="customer_id">ID Pelanggan:</label>
                                <input type="text" name="customer_id" id="customer_id" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="product_id">Produk:</label>
                                <select name="product_id" id="product_id" class="form-control" required>
                                    <option value="">Pilih Produk</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Kuantitas:</label>
                                <input type="number" name="quantity" id="quantity" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="total_price">Total Harga:</label>
                                <input type="number" name="total_price" id="total_price" class="form-control" required readonly>
                            </div>
                            <button type="submit" class="btn btn-primary">Buat Penjualan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var quantityInput = document.getElementById('quantity');
            var totalPriceInput = document.getElementById('total_price');
            var productSelect = document.getElementById('product_id');

            productSelect.addEventListener('change', function() {
                var selectedOption = productSelect.options[productSelect.selectedIndex];
                var productPrice = selectedOption.getAttribute('data-price');
                calculateTotalPrice(productPrice);
            });

            quantityInput.addEventListener('input', function() {
                var selectedOption = productSelect.options[productSelect.selectedIndex];
                var productPrice = selectedOption.getAttribute('data-price');
                calculateTotalPrice(productPrice);
            });

            function calculateTotalPrice(productPrice) {
                var quantity = parseFloat(quantityInput.value);
                var total = quantity * parseFloat(productPrice);
                totalPriceInput.value = total.toFixed(2);
            }
        });
    </script>
@endsection
