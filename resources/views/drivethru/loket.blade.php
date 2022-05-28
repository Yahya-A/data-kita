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

        {{isset($result) ? $result : ''}}
        @if (isset($result))
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Kendaraan</h6>
                        </div>
                        <div class="card-body">
                            The styling for this basic card example is created by using default Bootstrap
                            utility classes. By using utility classes, the style of the card component can be
                            easily modified with no need for any custom CSS!
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Dimensi</h6>
                        </div>
                        <div class="card-body">
                            The styling for this basic card example is created by using default Bootstrap
                            utility classes. By using utility classes, the style of the card component can be
                            easily modified with no need for any custom CSS!
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
