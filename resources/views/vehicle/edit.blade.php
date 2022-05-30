@extends('template')

@section('content')

    <div class="container-fluid">
        @if ($errors->hasBag('error_data_kendaraan'))
            {{$errors->getBag('error_data_kendaraan')}}
        @endif
        <form action="/data-induk/kendaraan/proses-ubah" method="POST">
            @csrf
            <input type="hidden" name="id_kendaraan" value="{{base64_encode($vehicle->id_kendaraan)}}">
            <input type="hidden" name="id_dimensi" value="{{base64_encode($vehicle->id_dimensi)}}">
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#pemilik" class="d-block card-header py-3" data-toggle="collapse"
                    role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Form Pemilik Kendaraan</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="pemilik">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control" name="nopol"
                                    placeholder="Nomor polisi" value="{{$vehicle->nopol}}">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="nouji"
                                    placeholder="Nomor uji" disabled value="{{$vehicle->nouji}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <input type="text" class="form-control"
                                    name="pemilik" placeholder="Pemilik" value="{{$vehicle->pemilik}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="alamat" cols="30" rows="5" placeholder="Alamat pemilik">{{$vehicle->pemilik}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#detail" class="d-block card-header py-3" data-toggle="collapse"
                    role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Form Detail Kendaraan</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="detail">
                    <div class="card-body">
                        <h6 class="m-0 mb-3 font-weight-bold text-primary">Detail Kendaraan</h6>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <select class="form-control" name="id_jenis" id="">
                                    <option value="">Pilih jenis kendaraan</option>
                                    @foreach ( $types as $type )
                                        <option value="{{$type->id_jenis}}" {{$vehicle->id_jenis == $type->id_jenis ? "selected" : "" }}>{{$type->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control"
                                    name="merk" placeholder="Merk" value="{{$vehicle->merk}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <input type="year" min="1900" class="form-control"
                                    name="tahun_buat" placeholder="Tahun buat" value="{{$vehicle->tahun_buat}}">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"
                                    name="silinder" placeholder="Silinder" value="{{$vehicle->silinder}}">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"
                                    name="no_tipe" placeholder="Tipe" value="{{$vehicle->no_tipe}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <input type="text" class="form-control"
                                    name="warna" placeholder="Warna kendaraan" value="{{$vehicle->warna}}">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"
                                    name="chasis" placeholder="Chasis" value="{{$vehicle->chasis}}">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"
                                    name="mesin" placeholder="Mesin" value="{{$vehicle->mesin}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <select class="form-control" name="warna_plat" id="">
                                    <option value="">Pilih warna plat</option>
                                    <option value="putih" {{$vehicle->warna_plat == 'putih' ? 'selected' : ''}}>Putih-Hitam</option>
                                    <option value="kuning" {{$vehicle->warna_plat == 'kuning' ? 'selected' : ''}}>Kuning-Hitam</option>
                                    <option value="merah" {{$vehicle->warna_plat == 'merah' ? 'selected' : ''}}>Merah-Hitam</option>
                                    <option value="hijau" {{$vehicle->warna_plat == 'hijau' ? 'selected' : ''}}>Hijaun-Hitam</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <select class="form-control" name="bahan_bakar" id="">
                                    <option value="">Pilih bahan bakar</option>
                                    <option value="solar" {{$vehicle->bahan_bakar == 'solar' ? 'selected' : ''}}>Solar</option>
                                    <option value="bensin" {{$vehicle->bahan_bakar == 'bensin' ? 'selected' : ''}}>Bensin</option>
                                    <option value="diesel" {{$vehicle->bahan_bakar == 'diesel' ? 'selected' : ''}}>Diesel</option>
                                    <option value="biodiesel" {{$vehicle->bahan_bakar == 'biodiesel' ? 'selected' : ''}}>Biodiesel</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="">Tanggal uji terakhir</label>
                                <input type="date" class="form-control"
                                name="tanggal_uji_akhir" placeholder="Tanggal uji terakhir" value="{{$vehicle->masa_akhir_uji}}">
                            </div>
                            <div class="col-sm-6">
                                <label for="">Lokasi uji terakhir</label>
                                <input type="text" class="form-control"
                                    name="lokasi_uji_akhir" placeholder="Lokasi uji" value="{{$vehicle->lokasi_uji_akhir}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#dimensi" class="d-block card-header py-3" data-toggle="collapse"
                    role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Form Dimensi Kendaraan</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="dimensi">
                    <div class="card-body">
                        <h6 class="m-0 mb-3 font-weight-bold text-primary">Dimensi Kendaraan</h6>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <input type="text" class="form-control"
                                    name="panjang" placeholder="Panjang" value="{{!is_null($vehicle->dimensi) ? $vehicle->dimensi->panjang : ''}}">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"
                                    name="lebar" placeholder="Lebar" value="{{!is_null($vehicle->dimensi) ? $vehicle->dimensi->lebar : ''}}">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"
                                    name="tinggi" placeholder="Tinggi" value="{{!is_null($vehicle->dimensi) ? $vehicle->dimensi->tinggi : ''}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <input type="text" class="form-control"
                                    name="panjang_bak" placeholder="Panjang bak" value="{{!is_null($vehicle->dimensi) ? $vehicle->dimensi->panjang_bak : ''}}">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"
                                    name="lebar_bak" placeholder="Lebar bak" value="{{!is_null($vehicle->dimensi) ? $vehicle->dimensi->lebar_bak : ''}}">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"
                                    name="tinggi_bak" placeholder="Tinggi bak" value="{{!is_null($vehicle->dimensi) ? $vehicle->dimensi->tinggi_bak : ''}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control"
                                    name="bahan_bak" placeholder="Bahan bak" value="{{!is_null($vehicle->dimensi) ? $vehicle->dimensi->bahan_bak : ''}}">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control"
                                    name="ban" placeholder="Ban" value="{{!is_null($vehicle->dimensi) ? $vehicle->dimensi->ban : ''}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control"
                                    name="jbb" placeholder="JBB" value="{{!is_null($vehicle->dimensi) ? $vehicle->dimensi->jbb : ''}}">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control"
                                    name="jbi" placeholder="JBI" value="{{!is_null($vehicle->dimensi) ? $vehicle->dimensi->jbi : ''}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <input type="text" class="form-control"
                                    name="dao" placeholder="D.A.O" value="{{!is_null($vehicle->dimensi) ? $vehicle->dimensi->dao : ''}}">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"
                                    name="dao_dab" placeholder="D.A.O/D.A.B" value="{{!is_null($vehicle->dimensi) ? $vehicle->dimensi->dao_dab : ''}}">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"
                                    name="roh_foh" placeholder="R.O.H/F.O.H" value="{{!is_null($vehicle->dimensi) ? $vehicle->dimensi->roh_foh : ''}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <input type="text" class="form-control"
                                    name="tempat_duduk" placeholder="Jumlah tempat duduk" value="{{!is_null($vehicle->dimensi) ? $vehicle->dimensi->tempat_duduk : ''}}">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"
                                    name="mst" placeholder="MST" value="{{!is_null($vehicle->dimensi) ? $vehicle->dimensi->mst : ''}}">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"
                                    name="kjt" placeholder="KJT" value="{{!is_null($vehicle->dimensi) ? $vehicle->dimensi->kjt : ''}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <button type="reset" class="btn btn-danger btn-block">
                        Reset
                    </a>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary btn-block">
                        Perbarui
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection
