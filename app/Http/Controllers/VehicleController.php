<?php

namespace App\Http\Controllers;

use App\Models\Dimention;
use App\Models\Vehicle;
use App\Models\VehicleType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VehicleController extends Controller
{
    public function tes()
    {
        return 'tesss';
    }
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('vehicle.index')->with('vehicles', $vehicles);
    }

    public function add()
    {
        $last_id = Vehicle::all()->last()->id_kendaraan + 1;
        $nouji = 'JKT'.$last_id. rand(100000, 999999);
        $types = VehicleType::all();
        return view('vehicle.add')->with('types', $types)->with('nouji', $nouji);
    }

    public function edit($id)
    {
        $types = VehicleType::all();
        $vehicle = Vehicle::with('dimensi')->find(base64_decode($id));
        return view('vehicle.edit')->with(['vehicle' => $vehicle, 'types' =>$types]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nopol'             => 'required',
            'nouji'             => 'required',
            'pemilik'           => 'required',
            'alamat'            => 'required',
            'id_jenis'          => 'required',
            'silinder'          => 'required',
            'tahun_buat'        => 'required',
            'no_tipe'           => 'required',
            'merk'              => 'required',
            'warna'             => 'required',
            'chasis'            => 'required',
            'mesin'             => 'required',
            'warna_plat'        => 'required',
            'bahan_bakar'       => 'required',
            'lokasi_uji_akhir'  => 'required',
            'tanggal_uji_akhir'    => 'required'
        ])->validateWithBag('error_data_kendaraan');

        try {
            $dimention = Dimention::create([
                'panjang'       => $request->panjang,
                'lebar'         => $request->lebar,
                'tinggi'        => $request->tinggi,
                'panjang_bak'   => $request->panjang_bak,
                'lebar_bak'     => $request->lebar_bak,
                'tinggi_bak'    => $request->tinggi_bak,
                'bahan_bak'     => $request->bahan_bak,
                'ban'           => $request->ban,
                'jbb'           => $request->jbb,
                'jbi'           => $request->jbi,
                'dao'           => $request->dao,
                'dab_dao'       => $request->dab_dao,
                'tempat_duduk'  => $request->tempat_duduk,
                'roh_foh'       => $request->roh_foh,
                'mst'           => $request->mst,
                'kjt'           => $request->kjt
            ]);

            Vehicle::create([
                'nopol'             => $request->nopol,
                'nouji'             => $request->nouji,
                'pemilik'           => $request->pemilik,
                'alamat'            => $request->alamat,
                'id_jenis'          => $request->id_jenis,
                'silinder'          => $request->silinder,
                'tahun_buat'        => $request->tahun_buat,
                'no_tipe'           => $request->no_tipe,
                'merk'              => $request->merk,
                'warna'             => $request->warna,
                'chasis'            => $request->chasis,
                'mesin'             => $request->mesin,
                'warna_plat'        => $request->warna_plat,
                'bahan_bakar'       => $request->bahan_bakar,
                'lokasi_uji_akhir'  => $request->lokasi_uji_akhir,
                'masa_akhir_uji'    => $request->tanggal_uji_akhir,
                'id_dimensi'      => $dimention->id_dimensi,
            ]);
        } catch (\Throwable $th) {
            return redirect('/data-induk/kendaraan/tambah')->withErrors('failed', $th->getMessage())->withInput();
        }

        return redirect('/data-induk/kendaraan');
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nopol'             => 'required',
            'nouji'             => 'required',
            'pemilik'           => 'required',
            'alamat'            => 'required',
            'id_jenis'          => 'required',
            'silinder'          => 'required',
            'tahun_buat'        => 'required',
            'no_tipe'           => 'required',
            'merk'              => 'required',
            'warna'             => 'required',
            'chasis'            => 'required',
            'mesin'             => 'required',
            'warna_plat'        => 'required',
            'bahan_bakar'       => 'required',
            'lokasi_uji_akhir'  => 'required',
            'tanggal_uji_akhir'    => 'required'
        ])->validateWithBag('error_data_kendaraan');

        try {
            $dimention = Dimention::find(base64_decode($request->id_dimensi));
            $dimention->panjang       = $request->panjang;
            $dimention->lebar         = $request->lebar;
            $dimention->tinggi        = $request->tinggi;
            $dimention->panjang_bak   = $request->panjang_bak;
            $dimention->lebar_bak     = $request->lebar_bak;
            $dimention->tinggi_bak    = $request->tinggi_bak;
            $dimention->bahan_bak     = $request->bahan_bak;
            $dimention->ban           = $request->ban;
            $dimention->jbb           = $request->jbb;
            $dimention->jbi           = $request->jbi;
            $dimention->dao           = $request->dao;
            $dimention->dab_dao       = $request->dab_dao;
            $dimention->tempat_duduk  = $request->tempat_duduk;
            $dimention->roh_foh       = $request->roh_foh;
            $dimention->mst           = $request->mst;
            $dimention->kjt           = $request->kj;
            $dimention->save();

            $vehicle = Vehicle::find(base64_decode($request->id_kendaraan));
            $vehicle->nopol             = $request->nopol;
            $vehicle->nouji             = $request->nouji;
            $vehicle->pemilik           = $request->pemilik;
            $vehicle->alamat            = $request->alamat;
            $vehicle->id_jenis          = $request->id_jenis;
            $vehicle->silinder          = $request->silinder;
            $vehicle->tahun_buat        = $request->tahun_buat;
            $vehicle->no_tipe           = $request->no_tipe;
            $vehicle->merk              = $request->merk;
            $vehicle->warna             = $request->warna;
            $vehicle->chasis            = $request->chasis;
            $vehicle->mesin             = $request->mesin;
            $vehicle->warna_plat        = $request->warna_plat;
            $vehicle->bahan_bakar       = $request->bahan_bakar;
            $vehicle->lokasi_uji_akhir  = $request->lokasi_uji_akhir;
            $vehicle->masa_akhir_uji    = $request->tanggal_uji_akhir;
            $vehicle->save();

        } catch (\Throwable $th) {
            return redirect('/data/induk/kendaraan/edit/'.base64_decode($request->id_kendaraan))->withErrors('failed', $th->getMessage())->withInput();
        }
        return redirect('/data-induk/kendaraan');
    }

    public function destroy($id)
    {
        $vehicle = Vehicle::find(base64_decode($id));
        $vehicle->dimensi()->delete();
        $vehicle->delete();

        return redirect('/data-induk/kendaraan');
    }

}
