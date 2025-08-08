<?php

namespace App\Http\Controllers;

use App\Models\tahunKendaraan;
use Illuminate\Http\Request;

class tahunKendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = tahunKendaraan::query();

        // Jika ada input 'cari' dari form
        if ($request->has('cari') && $request->cari != '') {
            $search = $request->cari;
            $query->where('tahun_kendaran', 'like', "%{$search}%");
        }

        $tahunKendaraan = $query->paginate(10); 
        return view('admin.tahunKendaraan.index',compact('tahunKendaraan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tahunKendaraan.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tahun_kendaraan' => 'required',
        ]);
        $dataJurusan = tahunKendaraan::create([           
            'tahun_kendaran' => $request->input('tahun_kendaraan'),
        ]);
        return redirect()->route('tahunKendaraan.index')
                ->with('success', 'Data Tahun Kendaraan Berhasil Ditambahkan');
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
        $tahunKendaraan = tahunKendaraan::where('id','=',$id)
        ->get();
        return view('admin.tahunKendaraan.edit',compact('tahunKendaraan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tahun_kendaraan' => 'required',
          
        ]);
        $tahunKendaraan = tahunKendaraan::findOrFail($id);
        $tahunKendaraan->update([
            'tahun_kendaran' => $request->input('tahun_kendaraan'),
        ]);        

        return redirect()->route('tahunKendaraan.index')
            ->with('success', 'Data Tahun Kendaraan Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tahunKendaraan = tahunKendaraan::findOrFail($id);
        $tahunKendaraan->delete();
        
        return redirect()->route('tahunKendaraan.index')
        ->with('success', 'Data Tahun Kendaraan Di Hapus');
    }
}