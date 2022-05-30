<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    public function index()
    {
        return view('ticket.index');
    }

    public function add(Request $request)
    {
        $vehicle = Vehicle::where('nouji', $request->get('no-uji'))->first();
        return view('ticket.add')->with('vehicle', $vehicle);
    }

    public function search(Request $request)
    {
        $result = Vehicle::with('dimensi', 'jenis')->where('nouji', $request->get('no-uji'))->first();
        return view('ticket.index')->with('result', $result);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'bukti_tilang'  => 'required',
            'dimensi'       => 'required',
        ])->validateWithBag('error_data_tilang');

        $name = Str::random(20).'.'. $request->file('bukti_tilang')->getClientOriginalExtension();
        $request->file('bukti_tilang')->storeAs('public/bukti', $name);

        $id_tilang = 'T-'.strtoupper(Str::random(3)).rand(10000, 99999);
        $ticket = Ticket::create([
            'id_tilang'     => $id_tilang,
            'id_kendaraan'  => $request->id_kendaraan,
            'bukti_tilang'  => $name,
            'dimensi'       => $request->dimensi,
            'overloading'   => isset($request->overloading) ? 1 : 0,
            'rubah_bentuk'  => isset($request->rubah_bentuk) ? 1 : 0,
            'mati_uji'      => isset($request->mati_uji) ? 1 : 0,
            'lainnya'       => $request->lainnya,
        ]);

        return $request->all();

        return $ticket ? redirect('/tilang') : redirect('/tilang')->with('failed', 'terjadi kesalahan');
    }
}
