<?php

namespace App\Http\Controllers;

use App\Models\asuransiRate;
use App\Models\tenor;
use Illuminate\Http\Request;

class tenorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = tenor::with('asuransiRate');
        $search = $request->input('cari'); 

        // Filter jika ada pencarian
        if ($search) {
            $query->where('tenor', 'like', '%' . $search . '%')
                ->orWhere('satuan', 'like', '%' . $search . '%')
                ->orWhereHas('asuransiRate', function ($q) use ($search) {
                    $q->where('asuransi_rate', 'like', '%' . $search . '%');
                });
        }

        $tenor = $query->paginate(10)->appends(['cari' => $search]);
        return view('admin.tenor.index',compact('tenor', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $query = asuransiRate::get(); 
        return view('admin.tenor.create',compact('query'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'tenor' => 'required',
            'satuan' => 'required',
            'asuransiRate' => 'required',
        ]);
        $dataJurusan = tenor::create([           
            'tenor' => $request->input('tenor'),
            'satuan' => $request->input('satuan'),
            'id_asuransi_rate' => $request->input('asuransiRate'),

        ]);
        return redirect()->route('tenor.index')
                ->with('success', 'Data Tenor Berhasil Ditambahkan');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
