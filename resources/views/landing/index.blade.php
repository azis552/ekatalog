@extends('landing.template.master')
@section('content')
    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <!-- Featured End -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <!-- Shop Product Start -->
            <div class="col-lg-12 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <form action="">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search by name">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-transparent text-primary">
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </div>
                                </div>
                            </form>
                            <div class="dropdown ml-4">
                                <button class="btn border dropdown-toggle" type="button" id="triggerId"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Sort by
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                    <a class="dropdown-item" href="#">Latest</a>
                                    <a class="dropdown-item" href="#">Popularity</a>
                                    <a class="dropdown-item" href="#">Best Rating</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach ($produks as $item)
                        <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                            <div class="card shadow product-item border-0 mb-4">
                                <div
                                    class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <img class="img-fluid w-100" style="width: 300px ; height: 300px;" src="{{ asset('storage/images') }}/{{ $item->foto }}" alt="">
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate mb-3">{{ $item->name }}</h6>
                                    <div class="d-flex justify-content-center">
                                        <h6>Rp {{ $item->harga }}</h6>
                                        <h6 class="text-muted ml-2"><del> Rp {{ $item->harga + 10000 }}</del></h6>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between bg-light border">
                                    <a href="{{ route('landing.produk.detail', $item->id) }}" class="btn btn-sm text-dark p-0"><i
                                            class="fas fa-eye text-primary mr-1"></i>View
                                        Detail</a>
                                    <a href="{{ route('landing.produk.detail', $item->id) }}" class="btn btn-sm text-dark p-0"><i
                                            class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center">
                                    {{ $produks->links() }}
                                </div>
            </div>
        </div>
    </div>
    <hr>

<div class="d-flex justify-content-center align-items-center  bg-gray-100">
    <div class="bg-white shadow rounded-lg p-4 text-center" style="width: 300px;">
        <h3 class="font-weight-bold mb-2">List Vendor</h3>
    </div>
</div>

    <!-- Shop Product End -->
    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            @foreach ($vendors as $item)
                <div class="col-lg-4 shadow col-md-6 pb-1">
                    <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                        <p class="text-right">{{ $item->produk->count() }}</p>
                        <a href="{{ asset('landing') }}/" class="cat-img position-relative overflow-hidden mb-3">
                            <img class="img-fluid" style="width: 300px ; height: 200px;" src="{{ asset('storage/images') }}/{{ $item->foto }}" alt="">
                        </a>
                        <h5 class="font-weight-semi-bold m-0">{{ $item->name }}</h5>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
                                    {{ $vendors->links() }}
                                </div>
    </div>
    <!-- Categories End -->
@endsection
