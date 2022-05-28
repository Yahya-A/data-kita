<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DrivethruController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\AdditionalDataController;
use App\Http\Controllers\VehicleTypeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', [DashboardController::class, 'home']);
Route::group(['prefix' => 'data-induk/kendaraan'], function() {
    Route::get('/', [VehicleController::class, 'index']);
    Route::get('tambah', [VehicleController::class, 'add']);
    Route::post('proses-tambah', [VehicleController::class, 'store']);
    Route::post('proses-ubah', [VehicleController::class, 'update']);
    Route::get('edit/{id}', [VehicleController::class, 'edit']);
    Route::get('delete/{id}', [VehicleController::class, 'destroy']);
});
Route::group(['prefix' => 'data-tambahan/jenis-kendaraan'], function() {
    Route::get('/', [VehicleTypeController::class, 'index']);
    Route::get('tambah', [VehicleTypeController::class, 'add']);
    Route::post('proses-tambah', [VehicleTypeController::class, 'store']);
    Route::post('proses-ubah', [VehicleTypeController::class, 'update']);
    Route::get('edit/{id}', [VehicleTypeController::class, 'edit']);
    Route::get('delete/{id}', [VehicleTypeController::class, 'destroy']);
});
Route::group(['prefix' => 'drivethru'], function(){
    Route::get('/', [DrivethruController::class,'index']);
    Route::get('/search', [DrivethruController::class,'search']);
});
