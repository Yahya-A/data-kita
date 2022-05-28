<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id('id_kendaraan');
            $table->string('nopol');
            $table->string('nouji');
            $table->string('pemilik');
            $table->text('alamat');
            $table->string('id_jenis');
            $table->string('silinder');
            $table->integer('tahun_buat');
            $table->string('no_tipe');
            $table->string('merk');
            $table->string('warna');
            $table->string('chasis');
            $table->string('mesin');
            $table->string('warna_plat');
            $table->string('bahan_bakar');
            $table->string('lokasi_uji_akhir');
            $table->string('masa_akhir_uji');
            $table->string('id_dimensi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
