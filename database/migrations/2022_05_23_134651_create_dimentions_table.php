<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDimentionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dimentions', function (Blueprint $table) {
            $table->id('id_dimensi');
            $table->string('panjang')->nullable();
            $table->string('lebar')->nullable();
            $table->string('tinggi')->nullable();
            $table->string('panjang_bak')->nullable();
            $table->string('lebar_bak')->nullable();
            $table->string('tinggi_bak')->nullable();
            $table->string('bahan_bak')->nullable();
            $table->string('ban')->nullable();
            $table->string('jbb')->nullable();
            $table->string('jbi')->nullable();
            $table->string('dao')->nullable();
            $table->string('dab_dao')->nullable();
            $table->string('tempat_duduk')->nullable();
            $table->string('roh_foh')->nullable();
            $table->string('mst')->nullable();
            $table->string('kjt')->nullable();
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
        Schema::dropIfExists('dimentions');
    }
}
