@extends('template')

@section('content')

    <div class="container-fluid">
        <form action="/data-induk/kendaraan/proses-tambah" method="POST">
            @csrf
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
                                    placeholder="Nomor polisi" required>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="nouji"
                                    placeholder="Nomor uji" value="{{$nouji}}" disabled required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <input type="text" class="form-control border "
                                    name="pemilik" placeholder="Pemilik" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="alamat" cols="30" rows="5" placeholder="Alamat pemilik" required></textarea>
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
                                <select class="form-control" name="id_jenis" id="" required>
                                    <option value="">Pilih jenis kendaraan</option>
                                    @foreach ( $types as $type )
                                        <option value="{{$type->id_jenis}}">{{$type->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control"
                                    name="merk" placeholder="Merk" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <input type="year" min="1900" class="form-control"
                                    name="tahun_buat" placeholder="Tahun buat" required>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"
                                    name="silinder" placeholder="Silinder" required>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"
                                    name="no_tipe" placeholder="Tipe" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <input type="text" class="form-control"
                                    name="warna" placeholder="Warna kendaraan" required>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"
                                    name="chasis" placeholder="Chasis" required>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"
                                    name="mesin" placeholder="Mesin" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <select class="form-control" name="warna_plat" id="" required>
                                    <option value="">Pilih warna plat</option>
                                    <option value="hitam">Putih-Hitam</option>
                                    <option value="kuning">Kuning-Hitam</option>
                                    <option value="merah">Merah-Hitam</option>
                                    <option value="hijau">Hijaun-Hitam</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <select class="form-control" name="bahan_bakar" id="" required>
                                    <option value="">Pilih bahan bakar</option>
                                    <option value="solar">Solar</option>
                                    <option value="bensin">Bensin</option>
                                    <option value="diesel">Diesel</option>
                                    <option value="biodiesel">Biodiesel</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="">Tanggal uji terakhir</label>
                                <input type="date" class="form-control"
                                name="tanggal_uji_akhir" placeholder="Tanggal uji terakhir" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="">Lokasi uji terakhir</label>
                                <input type="text" class="form-control"
                                    name="lokasi_uji_akhir" placeholder="Lokasi uji" required>
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
                                    name="panjang" placeholder="Panjang">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"
                                    name="lebar" placeholder="Lebar">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"
                                    name="tinggi" placeholder="Tinggi">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <input type="text" class="form-control"
                                    name="panjang_bak" placeholder="Panjang bak">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"
                                    name="lebar_bak" placeholder="Lebar bak">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"
                                    name="tinggi_bak" placeholder="Tinggi bak">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control"
                                    name="bahan_bak" placeholder="Bahan bak">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control"
                                    name="ban" placeholder="Ban">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control"
                                    name="jbb" placeholder="JBB">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control"
                                    name="jbi" placeholder="JBI">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <input type="text" class="form-control"
                                    name="dao" placeholder="D.A.O">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"
                                    name="dao_dab" placeholder="D.A.O/D.A.B">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"
                                    name="roh_foh" placeholder="R.O.H/F.O.H">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <input type="text" class="form-control"
                                    name="tempat_duduk" placeholder="Jumlah tempat duduk">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"
                                    name="mst" placeholder="MST">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"
                                    name="kjt" placeholder="KJT">
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
                        Tambahkan
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection
