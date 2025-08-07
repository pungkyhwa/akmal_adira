 <?php

use App\Http\Controllers\asuransiRateController;
use App\Http\Controllers\tenorController;
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

