<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_kendaraan';
    protected $guarded = [];

    public function dimensi()
    {
        return $this->hasOne(Dimention::class, 'id_dimensi', 'id_dimensi');
    }

    public function jenis()
    {
        return $this->hasOne(VehicleType::class, 'id_jenis', 'id_jenis');
    }
}
