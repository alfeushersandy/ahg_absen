<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\AbsenotcController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\MakanController;
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

Route::get('/', function () {
    return view('karyawan.index');
});

Route::get('/data', [KaryawanController::class, 'data'])->name('karyawan.data');

Route::get('/otc/data', [KaryawanController::class, 'data2'])->name('otc.data');
Route::get('/otc', [KaryawanController::class, 'otc'])->name('otc.index');
Route::get('/absen/otc', [AbsenotcController::class, 'index'])->name('absenotc.index');
Route::get('/absen/otc/data', [AbsenotcController::class, 'data'])->name('absenotc.data');
Route::post('/absen/otc/import', [AbsenotcController::class, 'import'])->name('otc.import');

Route::get('/absen',[AbsenController::class, 'index'])->name('absen.index');
Route::get('/absen/data', [AbsenController::class, 'data'])->name('absen.data');
Route::post('/absen/import', [AbsenController::class, 'import'])->name('absen.import');

Route::get('/kehadiran', [MakanController::class, 'index'])->name('kehadiran.data');
Route::get('makan/{tanggal_awal}/{tanggal_akhir}', [MakanController::class, 'getData'])->name('makan.data');