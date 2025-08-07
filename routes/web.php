<?php

use App\Http\Controllers\asuransiRateController;
use App\Http\Controllers\tenorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('admin.dashboard');});


Route::resource('/asuransiRate', asuransiRateController::class);
Route::resource('/tenor',tenorController::class);

