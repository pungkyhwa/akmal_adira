<?php

namespace App\Http\Controllers;

use App\Models\tipeKendaraan;
use Illuminate\Http\Request;

class tipeKendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = tipeKendaraan::query();

        // Jika ada input 'cari' dari form
        if ($request->has('cari') && $request->cari != '') {
            $search = $request->cari;
            $query->where('tipe_kendaraan', 'like', "%{$search}%")
            ->orWhere('kode_tipe', 'like', "%{$search}%");
        }

        $tipeKendaraan = $query->paginate(10); 
        return view('admin.tipeKendaraan.index',compact('tipeKendaraan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tipeKendaraan.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipe_kendaraan' => 'required',
            'kode_tipe' => 'required',
        ]);
        $dataJurusan = tipeKendaraan::create([           
            'tipe_kendaraan' => $request->input('tipe_kendaraan'),
            'kode_tipe' => $request->input('kode_tipe'),
        ]);
        return redirect()->route('tipeKendaraan.index')
                ->with('success', 'Data Jenis Kendaraan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tipeKendaraan = tipeKendaraan::where('id','=',$id)
        ->get();
        return view('admin.tipeKendaraan.edit',compact('tipeKendaraan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tipe_kendaraan' => 'required',
            'kode_tipe' => 'required',
        ]);
        $tipeKendaraan = tipeKendaraan::findOrFail($id);
        $tipeKendaraan->update([
            'tipe_kendaraan' => $request->input('tipe_kendaraan'),
            'kode_tipe' => $request->input('kode_tipe'),
        ]);        

        return redirect()->route('tipeKendaraan.index')
            ->with('success', 'Data Jenis Kendaraan Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tipeKendaraan = tipeKendaraan::findOrFail($id);
        $tipeKendaraan->delete();
        
        return redirect()->route('tipeKendaraan.index')
        ->with('success', 'Data Jenis Kendaraan Di Hapus');
    }
}
