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
                                <h4 class="card-title">Tambah Produk</h4>
                            </div>
                        </div>
                        <form action="{{ route('produk.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="">Nama Produk</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Masukkan Nama Produk">
                                </div>
                                <div class="mb-3">
                                    <label for="">Kategori</label>
                                    <input type="text" class="form-control" name="kategori" id="kategori"
                                        placeholder="Masukkan Kategori">
                                </div>
                                <div class="mb-3">
                                    <label for="">Harga</label>
                                    <input type="number" class="form-control" name="harga" id="harga"
                                        placeholder="Masukkan Harga">
                                </div>
                                <div class="mb-3">
                                    <label for="">Stok</label>
                                    <input type="number" class="form-control" name="stok" id="stok"
                                        placeholder="Masukkan Stok">
                                </div>
                                <div class="mb-3">
                                    <label for="">Berat</label>
                                    <input type="text" class="form-control" name="berat" id="berat"
                                        placeholder="Masukkan Berat">
                                </div>
                                <div class="mb-3">
                                    <label for="">foto</label>
                                    <input type="file" class="form-control" name="foto" id="foto"
                                        placeholder="Masukkan Foto">
                                </div>
                                <div class="mb-3">
                                    <label for="">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control"
                                        placeholder="Masukkan Deskripsi"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">File</label>
                                    <input type="file" class="form-control" name="file" id="file"
                                        placeholder="Masukkan File">
                                </div>
                            </div>
                            <div class="card-action">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('produk.index') }}" class="btn btn-danger">Kembali</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
