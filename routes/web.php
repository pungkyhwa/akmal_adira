 <?php

use App\Http\Controllers\Api\HargaKendaraanAjaxController;
use App\Http\Controllers\asuransiRateController;
use App\Http\Controllers\BiayaAdminController;
use App\Http\Controllers\biayaMitraController;
use App\Http\Controllers\HargaKendaraanController;
use App\Http\Controllers\jnsKendaraanController;
use App\Http\Controllers\merekKendaraanController;
use App\Http\Controllers\rateController;
use App\Http\Controllers\SimulasiController;
use App\Http\Controllers\tahunKendaraanController;
use App\Http\Controllers\tenorController;
use App\Http\Controllers\tipeKendaraanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('admin.dashboard');});

Route::get('/adiraAlamSutera', function() {
    return view('landingPage.index');
});

Route::get('/tentangAdira', function() {
    return view('landingPage.tentangAdira');
});

Route::resource('/asuransiRate', asuransiRateController::class);
Route::resource('/tenor',tenorController::class);
Route::resource('/rate',rateController::class);
Route::resource('/biayaMitra',biayaMitraController::class);
Route::resource('/biayaAdmin',BiayaAdminController::class);

Route::resource('/jnsKendaraan',jnsKendaraanController::class);
Route::resource('/merekKendaraan',merekKendaraanController::class);
Route::resource('/tipeKendaraan',tipeKendaraanController::class);
Route::resource('/tahunKendaraan',tahunKendaraanController::class);
Route::resource('/hargaKendaraan',HargaKendaraanController::class);

Route::get('/simulasi', [SimulasiController::class,'index'])->name('simulasi.index');
Route::get('/harga-kendaraan/{jns}/{merk}/{tipe}/{thn}',[HargaKendaraanAjaxController::class, 'hargaKendaraan'])->name('harga.kendaraan');
Route::post('/postSimulasi', [SimulasiController::class,'storeSimulasi'])->name('simulasi.storeSimulasi');
Route::get('/simulasi/dataCalonPeminjam', [SimulasiController::class,'dataCalonNasabah'])->name('simulasi.dataCalonNasabah');
Route::post('/simulasi/dataCalonPeminjam', [SimulasiController::class,'storeDataCalonNasabah'])->name('simulasi.storeDataCalonNasabah');
