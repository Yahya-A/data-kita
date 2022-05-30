<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DrivethruController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\AdditionalDataController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TicketController;
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

Route::middleware('auth')->get('/', function() {
    return redirect('/home');
});

Route::middleware('auth')->get('/home', [DashboardController::class, 'home']);
Route::group(['prefix' => 'auth'], function() {
    Route::get('/', [AuthController::class, 'index'])->name('auth');
    Route::get('logout', [AuthController::class, 'logout']);
    Route::post('login', [AuthController::class, 'login']);
});
Route::group(['prefix' => 'data-induk/kendaraan', 'middleware' => 'auth'], function() {
    Route::get('/', [VehicleController::class, 'index']);
    Route::get('tambah', [VehicleController::class, 'add']);
    Route::post('proses-tambah', [VehicleController::class, 'store']);
    Route::post('proses-ubah', [VehicleController::class, 'update']);
    Route::get('edit/{id}', [VehicleController::class, 'edit']);
    Route::get('delete/{id}', [VehicleController::class, 'destroy']);
});
Route::group(['prefix' => 'data-tambahan/jenis-kendaraan', 'middleware' => 'auth'], function() {
    Route::get('/', [VehicleTypeController::class, 'index']);
    Route::get('tambah', [VehicleTypeController::class, 'add']);
    Route::post('proses-tambah', [VehicleTypeController::class, 'store']);
    Route::post('proses-ubah', [VehicleTypeController::class, 'update']);
    Route::get('edit/{id}', [VehicleTypeController::class, 'edit']);
    Route::get('delete/{id}', [VehicleTypeController::class, 'destroy']);
});
Route::group(['prefix' => 'tilang', 'middleware' => 'auth'], function() {
    Route::get('/', [TicketController::class, 'index']);
    Route::get('search', [TicketController::class, 'search']);
    Route::get('tambah', [TicketController::class, 'add']);
    Route::post('upload-bukti', [TicketController::class, 'store']);
});
Route::group(['prefix' => 'drivethru', 'middleware' => 'auth'], function(){
    Route::get('/', [DrivethruController::class,'index']);
    Route::get('search', [DrivethruController::class,'search']);
});
