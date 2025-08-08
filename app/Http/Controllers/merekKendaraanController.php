<?php

namespace App\Http\Controllers;

use App\Models\merekKendaraan;
use Illuminate\Http\Request;

class merekKendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = merekKendaraan::query();

        // Jika ada input 'cari' dari form
        if ($request->has('cari') && $request->cari != '') {
            $search = $request->cari;
            $query->where('merek_kendaraan', 'like', "%{$search}%");
        }

        $merekKendaraan = $query->paginate(10); 
        return view('admin.merekKendaraan.index',compact('merekKendaraan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.merekKendaraan.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'merek_kendaraan' => 'required',
        ]);
        $dataJurusan = merekKendaraan::create([           
            'merek_kendaraan' => $request->input('merek_kendaraan'),
        ]);
        return redirect()->route('merekKendaraan.index')
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
        $merekKendaraan = merekKendaraan::where('id','=',$id)
        ->get();
        return view('admin.merekKendaraan.edit',compact('merekKendaraan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'merek_kendaraan' => 'required',
          
        ]);
        $merekKendaraan = merekKendaraan::findOrFail($id);
        $merekKendaraan->update([
            'merek_kendaraan' => $request->input('merek_kendaraan'),
        ]);        

        return redirect()->route('merekKendaraan.index')
            ->with('success', 'Data Jenis Kendaraan Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $merekKendaraan = merekKendaraan::findOrFail($id);
        $merekKendaraan->delete();
        
        return redirect()->route('merekKendaraan.index')
        ->with('success', 'Data Merek Kendaraan Di Hapus');
    }
}
