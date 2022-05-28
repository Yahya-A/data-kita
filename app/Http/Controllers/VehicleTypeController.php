<?php

namespace App\Http\Controllers;

use App\Models\VehicleType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VehicleTypeController extends Controller
{
    public function index()
    {
        $types = VehicleType::all();
        return view('additional.type.index')->with('types', $types);
    }

    public function add()
    {
        return view('additional.type.add');
    }

    public function edit($id)
    {
        $type = VehicleType::find(base64_decode($id));
        return view('additional.type.edit')->with('type', $type);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'jenis' => 'required'
        ])->validateWithBag('error_jenis_kendaraan');

        VehicleType::create([
            'nama' => $request->jenis
        ]);

        return redirect('/data-tambahan/jenis-kendaraan');
    }

    public function update(Request $request)
    {
        Validator::make($request->all(), [
            'jenis' => 'required'
        ])->validateWithBag('error_jenis_kendaraan');

        $type = VehicleType::find(base64_decode($request->id));
        $type->nama = $request->jenis;
        $type->save();

        return redirect('/data-tambahan/jenis-kendaraan');
    }

    public function destroy($id)
    {
        $type = VehicleType::destroy(base64_decode($id));

        return redirect('/data-tambahan/jenis-kendaraan');
    }

}
