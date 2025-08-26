<?php
use App\Http\Controllers\Api\HargaKendaraanAjaxController;
use App\Http\Controllers\asuransiRateController;
use App\Http\Controllers\BiayaAdminController;
use App\Http\Controllers\biayaMitraController;
use App\Http\Controllers\cobaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataCalonNasabahController;
use App\Http\Controllers\HargaKendaraanController;
use App\Http\Controllers\jnsKendaraanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\merekKendaraanController;
use App\Http\Controllers\rateController;
use App\Http\Controllers\SettingNomorWhatsappController;
use App\Http\Controllers\SimulasiController;
use App\Http\Controllers\tahunKendaraanController;
use App\Http\Controllers\tenorController;
use App\Http\Controllers\tipeKendaraanController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::get('/', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('/asuransiRate', asuransiRateController::class);
    Route::resource('/tenor', tenorController::class);
    Route::resource('/rate', rateController::class);
    Route::resource('/biayaMitra', biayaMitraController::class);
    Route::resource('/biayaAdmin', BiayaAdminController::class);

    Route::resource('/jnsKendaraan', jnsKendaraanController::class);
    Route::resource('/merekKendaraan', merekKendaraanController::class);
    Route::resource('/tipeKendaraan', tipeKendaraanController::class);
    Route::resource('/tahunKendaraan', tahunKendaraanController::class);
    Route::resource('/hargaKendaraan', HargaKendaraanController::class);

    // Route::resource('/coba', cobaController::class);
    Route::get('/dataCalonNasabah', [DataCalonNasabahController::class, 'index'])->name('dataCalonNasabah.index');
    Route::get('/dataCalonNasabah/detailCalonNasabah/{id}', [DataCalonNasabahController::class, 'show'])->name('dataCalonNasabah.show');

    Route::get('/kontakWhatsapp', [SettingNomorWhatsappController::class, 'index'])->name('settingNomorWhatsapp.index');
    Route::get('/kontakWhatsapp/create', [SettingNomorWhatsappController::class, 'create'])->name('settingNomorWhatsapp.create');
    Route::post('/kontakWhatsapp/create', [SettingNomorWhatsappController::class, 'store'])->name('settingNomorWhatsapp.store');
    Route::get('/kontakWhatsapp/edit/{id}', [SettingNomorWhatsappController::class, 'edit'])->name('settingNomorWhatsapp.edit');
    Route::put('/kontakWhatsapp/edit/{id}', [SettingNomorWhatsappController::class, 'update'])->name('settingNomorWhatsapp.update');
});


Route::get('/adiraAlamSutera', function () {
    return view('landingPage.index');
});

Route::get('/tentangAdira', function () {
    return view('landingPage.tentangAdira');
});

Route::get('/simulasi', [SimulasiController::class, 'index'])->name('simulasi.index');
Route::get('/harga-kendaraan/{jns}/{merk}/{tipe}/{thn}', [HargaKendaraanAjaxController::class, 'hargaKendaraan'])->name('harga.kendaraan');
Route::post('/postSimulasi', [SimulasiController::class, 'storeSimulasi'])->name('simulasi.storeSimulasi');
Route::get('/simulasi/dataCalonPeminjam', [SimulasiController::class, 'dataCalonNasabah'])->name('simulasi.dataCalonNasabah');
Route::post('/simulasi/dataCalonPeminjam', [SimulasiController::class, 'storeDataCalonNasabah'])->name('simulasi.storeDataCalonNasabah');

// api
Route::get('/harga-kendaraan/{jns}/{merk}/{tipe}/{thn}', [HargaKendaraanAjaxController::class, 'hargaKendaraan'])->name('harga.kendaraan');
Route::get('/merek-kendaraan/{jns}', [HargaKendaraanAjaxController::class, 'merekKendaraan'])->name('harga.kendaraan');
Route::get('/tipe-kendaraan/{merk}', [HargaKendaraanAjaxController::class, 'tipeKendaraan'])->name('tipe.kendaraan');
Route::get('/tahun-kendaraan/{tipe}', [HargaKendaraanAjaxController::class, 'tahunKendaraan'])->name('tahun.kendaraan');

