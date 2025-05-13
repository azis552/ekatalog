@extends('admin.template.master')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Pengajuan Instansi Pemerintah</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">List Pengajuan Instansi Pemerintah</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Transaksi</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($datas as $vendor)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ str_pad($vendor->id, 5, '0', STR_PAD_LEFT) }}</td>
                                                <td>{{ $vendor->status }}</td>
                                                <td>
                                                    <a href="{{ route('transaksi.show', $vendor->id) }}"
                                                        class="btn btn-primary btn-sm">Detail</a>
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
