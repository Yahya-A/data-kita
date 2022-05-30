@extends('template')

@section('content')
    <div class="container-fluid">
        <h5>Data Induk</h5>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Cari Data Kendaraan</h6>
            </div>
            <div class="card-body">
                <form action="/drivethru/search" method="get" class="d-none d-sm-inline-block form-inline my-2 my-md-0 w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-1 small" name="no-uji" placeholder="Nomor uji"
                            aria-label="Search" aria-describedby="basic-addon2" value="{{isset($result) ? $result->nouji : ''}}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @if (isset($result))
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Kendaraan</h6>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tbody>
                                  <tr>
                                    <th scope="row" width="20">NOPOL</th>
                                    <td>{{$result->nopol}}</td>
                                    <th scope="row" width="20">MASA UJI AKHIR</th>
                                    <td>{{$result->masa_akhir_uji}}</td>
                                  </tr>
                                  <tr>
                                    <th scope="row" width="20">NO UJI</th>
                                    <td>{{$result->nouji}}</td>
                                    <th scope="row" width="20">MERK</th>
                                    <td>{{$result->merk}}</td>
                                  </tr>
                                  <tr>
                                    <th scope="row" width="20">PEMILIK</th>
                                    <td>{{$result->pemilik}}</td>
                                    <th scope="row" width="20">TYPE</th>
                                    <td>{{$result->no_tipe}}</td>
                                  </tr>
                                  <tr>
                                    <th scope="row" width="20">ALAMAT</th>
                                    <td>{{$result->alamat}}</td>
                                    <th scope="row" width="20">WARNA</th>
                                    <td>{{$result->warna}}</td>
                                  </tr>
                                  <tr>
                                    <th scope="row" width="20">LOKASI UJI TERKAHIR</th>
                                    <td>{{$result->lokasi_uji_akhir}}</td>
                                    <th scope="row" width="20">CHASIS</th>
                                    <td>{{$result->chasis}}</td>
                                  </tr>
                                  <tr>
                                    <th scope="row" width="20">JENIS</th>
                                    <td>{{$result->jenis->nama}}</td>
                                    <th scope="row" width="20">MESIN</th>
                                    <td>{{$result->mesin}}</td>
                                  </tr>
                                  <tr>
                                    <th scope="row" width="20">SILINDER</th>
                                    <td>{{$result->silinder}}</td>
                                    <th scope="row" width="20">WARNA PLAT</th>
                                    <td class="text-capitalize">{{$result->warna_plat}}</td>
                                  </tr>
                                  <tr>
                                    <th scope="row" width="20">TAHUN BUAT</th>
                                    <td>{{$result->tahun_buat}}</td>
                                    <th scope="row" width="20">BAHAN BAKAR</th>
                                    <td class="text-capitalize">{{$result->bahan_bakar}}</td>
                                  </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Dimensi</h6>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tbody>
                                  <tr>
                                    <th scope="row" width="20">PANJANG</th>
                                    <td>{{!is_null($result->dimensi) ? $result->dimensi->panjang : '-'}}</td>
                                    <th scope="row" width="20">JBB</th>
                                    <td>{{!is_null($result->dimensi) ? $result->dimensi->jbb : '-'}}</td>
                                  </tr>
                                  <tr>
                                    <th scope="row" width="20">LEBAR</th>
                                    <td>{{!is_null($result->dimensi) ? $result->dimensi->lebar : '-'}}</td>
                                    <th scope="row" width="20">JBI</th>
                                    <td>{{!is_null($result->dimensi) ? $result->dimensi->jbi : '-'}}</td>
                                  </tr>
                                  <tr>
                                    <th scope="row" width="20">TINGGI</th>
                                    <td>{{!is_null($result->dimensi) ? $result->dimensi->tinggi : '-'}}</td>
                                    <th scope="row" width="20">D.A.O</th>
                                    <td>{{!is_null($result->dimensi) ? $result->dimensi->dao : '-'}}</td>
                                  </tr>
                                  <tr>
                                    <th scope="row" width="20">P. BAK</th>
                                    <td>{{!is_null($result->dimensi) ? $result->dimensi->panjang_bak : '-'}}</td>
                                    <th scope="row" width="20">D.A.B/D.A.O</th>
                                    <td>{{!is_null($result->dimensi) ? $result->dimensi->dab_dao : '-'}}</td>
                                  </tr>
                                  <tr>
                                    <th scope="row" width="20">L. BAK</th>
                                    <td>{{!is_null($result->dimensi) ? $result->dimensi->lebar_bak : '-'}}</td>
                                    <th scope="row" width="20">TMPT. DUDUK</th>
                                    <td>{{!is_null($result->dimensi) ? $result->dimensi->tempat_duduk : '-'}}</td>
                                  </tr>
                                  <tr>
                                    <th scope="row" width="20">T. BAK</th>
                                    <td>{{!is_null($result->dimensi) ? $result->dimensi->tinggi_bak : '-'}}</td>
                                    <th scope="row" width="20">R.O.H/F.O.H</th>
                                    <td>{{!is_null($result->dimensi) ? $result->dimensi->roh_foh : '-'}}</td>
                                  </tr>
                                  <tr>
                                    <th scope="row" width="20">BAHAN BAK</th>
                                    <td>{{!is_null($result->dimensi) ? $result->dimensi->bahan_bak : '-'}}</td>
                                    <th scope="row" width="20">MST</th>
                                    <td>{{!is_null($result->dimensi) ? $result->dimensi->mst : '-'}}</td>
                                  </tr>
                                  <tr>
                                    <th scope="row" width="20">BAN</th>
                                    <td>{{!is_null($result->dimensi) ? $result->dimensi->ban : '-'}}</td>
                                    <th scope="row" width="20">KJT</th>
                                    <td>{{!is_null($result->dimensi) ? $result->dimensi->kjt : '-'}}</td>
                                  </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
