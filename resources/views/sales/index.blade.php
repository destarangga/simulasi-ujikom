@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <a href="{{ route('sales.create') }}" class="btn btn-primary mb-3">Add Sales</a>
                <div class="card">
                    <div class="card-header">Daftar Penjualan</div>

                    <div class="card-body">
                        @if ($sales->count() > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID Pelanggan</th>
                                        <th>ID Produk</th>
                                        <th>Kuantitas</th>
                                        <th>Total Harga</th>
                                        <th>Tanggal Penjualan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sales as $sale)
                                        <tr>
                                            <td>{{ $sale->customer_id }}</td>
                                            <td>{{ $sale->product_id }}</td>
                                            <td>{{ $sale->quantity }}</td>
                                            <td>{{ $sale->total_price }}</td>
                                            <td>{{ $sale->date }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>Tidak ada penjualan.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
