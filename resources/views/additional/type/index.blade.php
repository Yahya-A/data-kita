@extends('template')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Jenis Kendaraan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Jenis Kendaraan</h6>
            <a href="/data-tambahan/jenis-kendaraan/tambah" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis</th>
                            <th>Tanggal dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Jenis</th>
                            <th>Tanggal dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($types as $key => $type)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$type->nama}}</td>
                                <td>{{$type->created_at}}</td>
                                <td class="text-center">
                                    <a href="/data-tambahan/jenis-kendaraan/edit/{{base64_encode($type->id_jenis)}}" class="btn btn-primary">Ubah</a>
                                    <a href="/data-tambahan/jenis-kendaraan/delete/{{base64_encode($type->id_jenis)}}" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
