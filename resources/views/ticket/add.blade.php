@extends('template')

@section('content')

    <div class="container-fluid">
        @if ($errors->hasBag('error_data_tilang'))
            {{$errors->getBag('error_data_tilang')}}
        @endif
        <form action="/tilang/upload-bukti" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id_kendaraan" value="{{$vehicle->id_kendaraan}}">
            <div class="row">
                <div class="col-md-8">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Data Tilang</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label>Bukti Tilang</label>
                                </div>
                                <div class="col-sm-8 mb-3 mb-sm-0">
                                    <input class="form-control" type="file" name="bukti_tilang">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label>Dimensi</label>
                                </div>
                                <div class="col-sm-8 mb-3 mb-sm-0">
                                    <input type="text" class="form-control"
                                        name="dimensi" placeholder="Dimensi (mm)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label>Overloading</label>
                                </div>
                                <div class="col-sm-8 mb-3 mb-sm-0">
                                    <input type="checkbox" name="overloading">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label>Rubah Bentuk</label>
                                </div>
                                <div class="col-sm-8 mb-3 mb-sm-0">
                                    <input type="checkbox" name="rubah_bentuk">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label>Mati Uji</label>
                                </div>
                                <div class="col-sm-8 mb-3 mb-sm-0">
                                    <input type="checkbox" name="mati_uji">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label>Lainnya</label>
                                </div>
                                <div class="col-sm-8 mb-3 mb-sm-0">
                                    <input type="text" class="form-control"
                                        name="lainnya" placeholder="Lainnya">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Daftarkan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
