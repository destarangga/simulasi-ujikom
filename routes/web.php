<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SaleDetailController;
use Illuminate\Support\Facades\Route;

// Route untuk index, create, store, show, edit, update, dan destroy customers
Route::get('/', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/customers/{customer}', [CustomerController::class, 'show'])->name('customers.show');
Route::get('/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
Route::put('/customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('/customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');

// Route untuk index, create, store, show, edit, update, dan destroy products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/sales', [SaleController::class, 'index'])->name('sales.index');
Route::get('/sales/create', [SaleController::class, 'create'])->name('sales.create');
Route::get('/sales/checkout', [SaleController::class, 'checkout'])->name('sales.checkout');
Route::post('/sales', [SaleController::class, 'store'])->name('sales.store');
Route::get('/sales/{sale}', [SaleController::class, 'show'])->name('sales.show');
Route::get('/sales/{sale}/edit', [SaleController::class, 'edit'])->name('sales.edit');
Route::put('/sales/{sale}', [SaleController::class, 'update'])->name('sales.update');
Route::delete('/sales/{sale}', [SaleController::class, 'destroy'])->name('sales.destroy');


// Route untuk index, create, store, show, edit, update, dan destroy sale-details
Route::get('/sale-details', [SaleDetailController::class, 'index'])->name('sale-details.index');
Route::get('/sale-details/create', [SaleDetailController::class, 'create'])->name('sale-details.create');
Route::post('/sale-details', [SaleDetailController::class, 'store'])->name('sale-details.store');
Route::get('/sale-details/{saleDetail}', [SaleDetailController::class, 'show'])->name('sale-details.show');
Route::get('/sale-details/{saleDetail}/edit', [SaleDetailController::class, 'edit'])->name('sale-details.edit');
Route::put('/sale-details/{saleDetail}', [SaleDetailController::class, 'update'])->name('sale-details.update');
Route::delete('/sale-details/{saleDetail}', [SaleDetailController::class, 'destroy'])->name('sale-details.destroy');






