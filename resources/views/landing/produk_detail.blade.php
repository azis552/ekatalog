@extends('landing.template.master')
@section('content')
    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="{{ asset('storage/images') }}/{{ $produk->foto }}" alt="Image">
                        </div>

                    </div>

                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">{{ $produk->name }}</h3>
                <div class="d-flex mb-3">
                    <span class="badge badge-primary font-weight-normal px-3 mr-1"
                        style="border-radius: 9999px;">{{ $produk->kategori }}</span>

                </div>
                <h3 class="font-weight-semi-bold mb-4">Rp {{ $produk->harga }}</h3>
                <p class="mb-4">{{ $produk->deskripsi }}</p>
                <p class="mb-4"> Stok : {{ $produk->stok }}</p>


                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-minus">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" id="quantity" class="form-control bg-secondary text-center" value="1">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <button class="btn btn-primary px-3" id="addToCart">
                        <i class="fa fa-shopping-cart mr-1"></i> Add To Cart
                    </button>
                </div>
                <div id="cart-message" class="mt-2 text-success"></div>
                <div class="d-flex pt-2">
                    <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
@endsection


@section('script')
    <script>
        $(document).ready(function() {
            // Increment quantity
            // $('.btn-plus').click(function() {
            //     let quantity = parseInt($('#quantity').val());
            //     $('#quantity').val(quantity + 1);
            // });

            // // Decrement quantity
            // $('.btn-minus').click(function() {
            //     let quantity = parseInt($('#quantity').val());
            //     if (quantity > 1) {
            //         $('#quantity').val(quantity - 1);
            //     }
            // });

            // Add to Cart button click
            $('#addToCart').click(function() {
                let quantity = $('#quantity').val();
                $.ajax({
                    url: "{{ route('cart.add') }}", // Route ke controller Laravel
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}", // Token CSRF Laravel
                        product_id: 1, // ID produk (sesuaikan)
                        quantity: quantity
                    },
                    success: function(response) {
                        $('#cart-message').text("Produk berhasil ditambahkan ke keranjang!");
                        $('#cart-message').fadeIn().delay(2000).fadeOut();
                    },
                    error: function() {
                        alert("Terjadi kesalahan saat menambah ke keranjang.");
                    }
                });
            });
        });
    </script>
@endsection
