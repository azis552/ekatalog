@extends('admin.template.master')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Pengajuan Produk</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Show Produk</h4>
                            </div>
                        </div>
                        <form action="{{ route('produk.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="">Nama Produk</label>
                                    <input type="text" class="form-control" value="{{ $produk->name }}" name="name" id="name"
                                        placeholder="Masukkan Nama Produk">
                                </div>
                                <div class="mb-3">
                                    <label for="">Kategori</label>
                                    <input type="text" class="form-control" value="{{ $produk->kategori }}" name="kategori" id="kategori"
                                        placeholder="Masukkan Kategori">
                                </div>
                                <div class="mb-3">
                                    <label for="">Harga</label>
                                    <input type="number" class="form-control" value="{{ $produk->harga }}" name="harga" id="harga"
                                        placeholder="Masukkan Harga">
                                </div>
                                <div class="mb-3">
                                    <label for="">Stok</label>
                                    <input type="number" class="form-control" value="{{ $produk->stok }}" name="stok" id="stok"
                                        placeholder="Masukkan Stok">
                                </div>
                                <div class="mb-3">
                                    <label for="">Berat</label>
                                    <input type="text" class="form-control" value="{{ $produk->berat }}" name="berat" id="berat"
                                        placeholder="Masukkan Berat">
                                </div>
                                <div class="mb-3">
                                    <label for="">foto</label>
                                    <br>
                                    <img style="width: 400px" src="{{ asset('storage/images/') .'/'.$produk->foto }}" alt="">
                                </div>
                                <div class="mb-3">
                                    <label for="">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control"
                                        placeholder="Masukkan Deskripsi"> {{ $produk->deskripsi }}  </textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">File</label>
                                    <a href="{{ asset('storage/files/') . '/'.$produk->dokumen }}" class="btn btn-primary" >Download</a>
                                </div>
                            </div>
                            

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
