<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('admin.dashboard');});
Route::get('/asuransiRate', function () {return view('admin.asuransiRate.index');});
