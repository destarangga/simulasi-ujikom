@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Sales</div>

                    <div class="card-body">
                        <form id="salesForm" action="{{ route('sales.store') }}"  method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                @foreach ($products as $product)
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <div class="card-header">{{ $product->name }} - Rp{{ $product->price }}</div>
                                            <div class="card-body">
                                                <img src="{{ asset('path/to/your/image/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid mb-2">
                                                <p>Stok: {{ $product->stock }}</p>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <button class="btn btn-outline-primary minus-quantity" type="button" data-product="{{ json_encode($product) }}">-</button>
                                                    </div>
                                                    <input type="number" class="form-control quantity" value="1" min="1">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-primary plus-quantity" type="button" data-product="{{ json_encode($product) }}">+</button>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-primary add-to-cart" data-product="{{ json_encode($product) }}">Add to Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <hr>
                            <h4>Cart</h4>
                            <div id="cart"></div>
                            <hr>
                            <button type="submit" class="btn btn-primary">Selanjutnya</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cart = [];

            // Fungsi untuk merender keranjang
            function renderCart() {
                const cartElement = document.getElementById('cart');
                cartElement.innerHTML = '';
                let total = 0;

                cart.forEach(item => {
                    const product = document.createElement('div');
                    product.innerHTML = `
                        <p>${item.name} - Rp${item.price} x ${item.quantity}</p>
                    `;
                    cartElement.appendChild(product);
                    total += (item.price * item.quantity);
                });

                // Menampilkan total
                cartElement.innerHTML += `<hr><p><strong>Total: Rp${total}</strong></p>`;

                // Menambahkan event listener untuk tombol remove
                const removeButtons = document.querySelectorAll('.remove-from-cart');
                removeButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const productId = this.dataset.productId;
                        removeFromCart(productId);
                    });
                });
            }

            // Fungsi untuk menambahkan produk ke keranjang
            function addToCart(productData) {
                const product = JSON.parse(productData);
                const existingItem = cart.find(item => item.id === product.id);
                if (existingItem) {
                    existingItem.quantity += 1;
                } else {
                    cart.push({ id: product.id, name: product.name, price: product.price, quantity: 1 });
                }
                renderCart();
            }

            // Fungsi untuk menghapus produk dari keranjang
            function removeFromCart(productData) {
                const product = JSON.parse(productData);
                const index = cart.findIndex(item => item.id === product.id);
                if (index !== -1) {
                    // Kurangi quantity dengan 1 jika quantity > 1
                    if (cart[index].quantity > 1) {
                        cart[index].quantity -= 1;
                    } else {
                        // Jika quantity == 1, hapus item dari keranjang
                        cart.splice(index, 1);
                    }
                }
                renderCart();
            }

            // Event listener untuk tombol "Add to Cart"
            const addToCartButtons = document.querySelectorAll('.add-to-cart');
            addToCartButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const productData = this.dataset.product;
                    addToCart(productData);
                });
            });

            // Event listener untuk tombol "Remove from Cart"
            document.addEventListener('click', function(event) {
                if (event.target && event.target.classList.contains('remove-from-cart')) {
                    const productId = event.target.dataset.productId;
                    removeFromCart(productId);
                }
            });

            // Event listener untuk tombol "Minus Quantity"
            const minusQuantityButtons = document.querySelectorAll('.minus-quantity');
            minusQuantityButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const productData = this.dataset.product; // Ambil productId dari data-product-id
                    removeFromCart(productData);
                });
            });

            // Event listener untuk tombol "Plus Quantity"
            const plusQuantityButtons = document.querySelectorAll('.plus-quantity');
            plusQuantityButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const productData = this.dataset.product;
                    addToCart(productData);
                });
            });

            // Event listener untuk pengiriman form
            const form = document.getElementById('salesForm');
            form.addEventListener('submit', function(event) {
                event.preventDefault(); // Mencegah pengiriman form bawaan browser

                // Serialisasi data form
                const formData = new FormData(form);

                // Mengubah data form menjadi string yang diencode URL
                const encodedFormData = new URLSearchParams(formData).toString();

                // Mengirimkan permintaan POST ke endpoint sales.store
                fetch("{{ route('sales.store') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: encodedFormData
                })
                .then(response => {
                    if (response.ok) {
                        // Redirect ke halaman checkout jika pengiriman berhasil
                        window.location.href = "{{ route('sales.checkout') }}";
                    } else {
                        // Menangani skenario kesalahan di sini
                        console.error("Gagal mengirim form.");
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                });
            });
        });
    </script>

@endsection
