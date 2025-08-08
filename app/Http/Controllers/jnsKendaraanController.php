<?php

namespace App\Http\Controllers;

use App\Models\jnsKendaraan;
use Illuminate\Http\Request;

class jnsKendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = jnsKendaraan::query();

        // Jika ada input 'cari' dari form
        if ($request->has('cari') && $request->cari != '') {
            $search = $request->cari;
            $query->where('jns_kendaraan', 'like', "%{$search}%");
        }

        $jnsKendaraan = $query->paginate(10); 
        return view('admin.jnsKendaraan.index',compact('jnsKendaraan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jnsKendaraan.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jns_kendaraan' => 'required',
        ]);
        $dataJurusan = jnsKendaraan::create([           
            'jns_kendaraan' => $request->input('jns_kendaraan'),
        ]);
        return redirect()->route('jnsKendaraan.index')
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
        $jnsKendaraan = jnsKendaraan::where('id','=',$id)
        ->get();
        return view('admin.jnsKendaraan.edit',compact('jnsKendaraan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'jns_kendaraan' => 'required',
          
        ]);
        $jnsKendaraan = jnsKendaraan::findOrFail($id);
        $jnsKendaraan->update([
            'jns_kendaraan' => $request->input('jns_kendaraan'),
        ]);        

        return redirect()->route('jnsKendaraan.index')
            ->with('success', 'Data Jenis Kendaraan Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jnsKendaraan = jnsKendaraan::findOrFail($id);
        $jnsKendaraan->delete();
        
        return redirect()->route('jnsKendaraan.index')
        ->with('success', 'Data Jenis Kendaraan Di Hapus');
    }
}