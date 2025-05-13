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
                                <h4 class="card-title">List Pengajuan Produk</h4>
                                @if (Auth::user()->role != 'admin')
                                    
                                <a href="{{ route('produk.create') }}" class="btn btn-primary btn-round "
                                    style="margin-left: auto;">
                                    <i class="fa fa-plus"></i>
                                    Tambah Produk
                                </a>
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Status</th>
                                            <th>File</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($datas as $produk)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $produk->name }}</td>
                                                <td>{{ $produk->status }}</td>
                                                <td>
                                                    <a href="{{ asset('storage/files/' . $produk->dokumen) }}"
                                                        target="_blank" class="btn btn-primary btn-sm">Lihat</a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('produk.show', $produk->id) }}"
                                                        class="btn btn-primary btn-sm">Detail</a>
                                                    @if ($produk->status != 'Setuju' && Auth::user()->role != 'admin')
                                                        <a href="{{ route('produk.edit', $produk->id) }}"
                                                            class="btn btn-warning btn-sm">Edit</a>
                                                        <form action="{{ route('produk.destroy', $produk->id) }}"
                                                            method="post" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                                        </form>
                                                    @endif

                                                    @if (Auth::user()->role == 'admin')
                                                        <a
                                                            href="{{ route('updateStatusProduk', ['id' => $produk->id, 'status' => 'Setuju']) }}">
                                                            <button class="btn btn-primary btn-sm">Setuju</button>
                                                        </a>
                                                        <a
                                                            href="{{ route('updateStatusProduk', ['id' => $produk->id, 'status' => 'Tolak']) }}">
                                                            <button class="btn btn-danger btn-sm">Tolak</button>
                                                        </a>
                                                    @endif

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $datas->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
