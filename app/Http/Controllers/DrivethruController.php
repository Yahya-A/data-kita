<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class DrivethruController extends Controller
{
    public function index()
    {
        return view('drivethru.loket');
    }

    public function search(Request $request)
    {
        $result = Vehicle::with('dimensi')->where('nouji', $request->get('no-uji'))->first();

        return view('drivethru.loket')->with('result', $result);
    }
}
