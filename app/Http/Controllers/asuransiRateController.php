<?php

namespace App\Http\Controllers;

use App\Models\asuransiRate;
use Illuminate\Http\Request;

class asuransiRateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         $query = asuransiRate::query();

        // Jika ada input 'cari' dari form
        if ($request->has('cari') && $request->cari != '') {
            $search = $request->cari;
            $query->where('asuransi_rate', 'like', "%{$search}%")
                ->orWhere('satuan', 'like', "%{$search}%");
        }

        $asuransiRate = $query->paginate(10); 
        return view('admin.asuransiRate.index',compact('asuransiRate'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.asuransiRate.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rate' => 'required',
            'satuan' => 'required',
          
        ]);
        $dataJurusan = asuransiRate::create([           
            'asuransi_rate' => $request->input('rate'),
            'satuan' => $request->input('satuan'),
        ]);
        return redirect()->route('asuransiRate.index')
                ->with('success', 'Data Insurance Rate Berhasil Ditambahkan');
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
        $asuransiRate = asuransiRate::where('id','=',$id)
        ->get();
        return view('admin.asuransiRate.edit',compact('asuransiRate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'rate' => 'required',
            'satuan' => 'required',
          
        ]);
        $asuransiRate = asuransiRate::findOrFail($id);
        $asuransiRate->update([
            'asuransi_rate' => $request->input('rate'),
            'satuan' => $request->input('satuan'),
        ]);        

        return redirect()->route('asuransiRate.index')
            ->with('success', 'Data Insurance Rate Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $asuransiRate = asuransiRate::findOrFail($id);
        $asuransiRate->delete();
        
        return redirect()->route('asuransiRate.index')
        ->with('success', 'Data Insurance Rate Berhasil Di Hapus');
    }
}
