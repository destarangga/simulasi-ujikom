@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Daftar Detail Penjualan</div>

                    <div class="card-body">
                        @if ($saleDetails->count() > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID Penjualan</th>
                                        <th>Nama Produk</th>
                                        <th>Jumlah</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($saleDetails as $saleDetail)
                                        <tr>
                                            <td>{{ $saleDetail->sale_id }}</td>
                                            <td>{{ $saleDetail->product->name }}</td>
                                            <td>{{ $saleDetail->jumlah_produk }}</td>
                                            <td>{{ $saleDetail->subtotal }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>Tidak ada detail penjualan.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
