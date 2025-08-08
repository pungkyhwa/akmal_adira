<?php

namespace App\Http\Controllers;

use App\Models\rate;
use Illuminate\Http\Request;

class rateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = rate::query();

        // Jika ada input 'cari' dari form
        if ($request->has('cari') && $request->cari != '') {
            $search = $request->cari;
            $query->where('rate', 'like', "%{$search}%");
        }

        $rate = $query->paginate(10); 
        return view('admin.rate.index',compact('rate'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.rate.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rate' => 'required',
        ]);
        $dataJurusan = rate::create([           
            'rate' => $request->input('rate'),
        ]);
        return redirect()->route('rate.index')
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
        $rate = rate::where('id','=',$id)
        ->get();
        return view('admin.rate.edit',compact('rate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'rate' => 'required',
          
        ]);
        $rate = rate::findOrFail($id);
        $rate->update([
            'rate' => $request->input('rate'),
        ]);        

        return redirect()->route('rate.index')
            ->with('success', 'Data Tahun Kendaraan Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rate = rate::findOrFail($id);
        $rate->delete();
        
        return redirect()->route('rate.index')
        ->with('success', 'Data Tahun Kendaraan Di Hapus');
    }
}