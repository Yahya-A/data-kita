@extends('template')

@section('content')

    <div class="container-fluid">
        @if ($errors->hasBag('error_data_kendaraan'))
            {{$errors->getBag('error_data_kendaraan')}}
        @endif
        <form action="/data-tambahan/jenis-kendaraan/proses-tambah" method="POST">
            @csrf
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Data Jenis Kendaraan</h6>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-sm-8 mb-3 mb-sm-0">
                            <input type="text" class="form-control"
                                name="jenis" placeholder="Jenis kendaraan">
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary btn-block">
                                Tambahkan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
