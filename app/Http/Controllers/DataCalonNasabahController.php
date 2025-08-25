<?php

namespace App\Http\Controllers;

use App\Models\clnNasabah;
use Illuminate\Http\Request;

class DataCalonNasabahController extends Controller
{
    public function index(){
        $data = clnNasabah::orderByDesc('id')->paginate(10);
        // dd($data);
        return view('admin.dataCalonNasabah.index', compact('data'));
    }

    public function show(string $id){
        $data = clnNasabah::findOrFail($id);
        return view('admin.dataCalonNasabah.show', compact('data'));
    }
}
