<!-- resources/views/admin/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-primary text-white">{{ __('Admin Dashboard') }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card bg-info text-white mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Customers</h5>
                                        <p class="card-text">Manage your customers efficiently.</p>
                                        <a href="{{ route('customers.index') }}" class="btn btn-light">Manage Customers</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card bg-success text-white mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Products</h5>
                                        <p class="card-text">Manage your products and inventory.</p>
                                        <a href="{{ route('products.index') }}" class="btn btn-light">Manage Products</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="card bg-warning text-white mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Sales</h5>
                                        <p class="card-text">View and manage your sales records.</p>
                                        <a href="{{ route('sales.index') }}" class="btn btn-light">View Sales</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card bg-danger text-white mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Sale Details</h5>
                                        <p class="card-text">Detailed information about your sales.</p>
                                        <a href="{{ route('sale-details.index') }}" class="btn btn-light">View Sale Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
