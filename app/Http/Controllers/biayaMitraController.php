<?php

namespace App\Http\Controllers;

use App\Models\biayaMitra;
use App\Models\tenor;
use Illuminate\Http\Request;

class biayaMitraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = biayaMitra::with('tenor');
        $search = $request->input('cari'); 

        // Filter jika ada pencarian
        if ($search) {
            $query->where('biaya_mitra', 'like', '%' . $search . '%')
                ->orWhere('max_pinjaman', 'like', '%' . $search . '%')
                ->orWhere('min_pinjaman', 'like', '%' . $search . '%')
                ->orWhereHas('tenor', function ($q) use ($search) {
                    $q->where('tenor', 'like', '%' . $search . '%');
                });
        }

        $biayaMitra = $query->paginate(10)->appends(['cari' => $search]);
        return view('admin.biayaMitra.index',compact('biayaMitra', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tenor = tenor::get(); 
        return view('admin.biayaMitra.create',compact('tenor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'id_tenor' => 'required',
            'min_pinjaman' => 'required',
            'max_pinjaman' => 'required',
            'biaya_mitra' => 'required',
        ]);
        $dataJurusan = biayaMitra::create([           
            'id_tenor' => str_replace('.', '',$request->input('id_tenor')),
            'min_pinjaman' => str_replace('.', '',$request->input('min_pinjaman')),
            'max_pinjaman' => str_replace('.', '',$request->input('max_pinjaman')),
            'biaya_mitra' => str_replace('.', '',$request->input('biaya_mitra')),

        ]);
        return redirect()->route('tenor.index')
                ->with('success', 'Data Biaya Mitra Berhasil Ditambahkan');
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
        $tenor = tenor::get(); 
        $biayaMitra = biayaMitra::with('tenor')->where('id','=',$id)->get();
        return view('admin.biayaMitra.edit',compact('biayaMitra','tenor')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_tenor' => 'required',
            'min_pinjaman' => 'required',
            'max_pinjaman' => 'required',
            'biaya_mitra' => 'required',
        ]);
        $biayaMitra = biayaMitra::findOrFail($id);
        $biayaMitra->update([
            'id_tenor' => str_replace('.', '',$request->input('id_tenor')),
            'min_pinjaman' => str_replace('.', '',$request->input('min_pinjaman')),
            'max_pinjaman' => str_replace('.', '',$request->input('max_pinjaman')),
            'biaya_mitra' => str_replace('.', '',$request->input('biaya_mitra')),
        ]);        

        return redirect()->route('biayaMitra.index')
            ->with('success', 'Data Biaya Mitra Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $biayaMitra = biayaMitra::findOrFail($id);
        $biayaMitra->delete();
        
        return redirect()->route('biayaMitra.index')
        ->with('success', 'Data Biaya Mitra Di Hapus');
    }
}
