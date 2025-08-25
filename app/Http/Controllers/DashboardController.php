<?php

namespace App\Http\Controllers;

use App\Models\clnNasabah;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $calonNasabah = clnNasabah::get()->count();
        $dataCalonNasabah = clnNasabah::orderByDesc('id')->paginate(10);
        return view('admin.dashboard', compact('calonNasabah', 'dataCalonNasabah'));
    }
}
