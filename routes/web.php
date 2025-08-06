<?php

use App\Http\Controllers\asuransiRateController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('admin.dashboard');});

// asuransi rate
Route::resource('/asuransiRate', asuransiRateController::class);

