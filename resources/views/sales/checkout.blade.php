@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Checkout</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{ asset('path/to/your/image/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid mb-2">
                            </div>
                            <div class="col-md-6">
                                <h2>{{ $product->name }}</h2>
                                <p>Price: Rp{{ $product->price }}</p>
                                <p>Stock: {{ $product->stock }}</p>
                            </div>
                        </div>
                        <hr>
                        <h4>Customer Information</h4>
                        <form action="{{ route('sales.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product" value="{{ $product  ->id }}">
                            <input type="hidden" name="totalPrice" value="{{ $totalPrice }}">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input type="text" name="address" id="address" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone:</label>
                                <input type="text" name="phone" id="phone" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>  
        </div>
    </div>
@endsection
