<?php

namespace App\Http\Controllers;

use App\Models\biayaAdmin;
use App\Models\rate;
use App\Models\tenor;
use Illuminate\Http\Request;

class BiayaAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $query = biayaAdmin::query();

            // Jika ada input 'cari' dari form
            if ($request->has('cari') && $request->cari != '') {
                $search = $request->cari;
                $query->whereHas('rate', function ($q) use ($search) {
                    $q->where('rate', 'like', "%{$search}%");
                })
                    ->orWhereHas('tenor', function ($q) use ($search) {
                        $q->where('tenor', 'like', "%{$search}%");
                    })
                    ->where('biaya_admin', 'like', "%{$search}%")
                    ->where('min_pinjaman', 'like', "%{$search}%")
                    ->where('max_pinjaman', 'like', "%{$search}%");
            }

            $data = $query->paginate(10);
            return view('admin.biayaAdmin.index', compact('data'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Terjadi kesalahan');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $tenor = tenor::get();
            $rate = rate::get();
            return view('admin.biayaAdmin.create', compact('tenor', 'rate'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Terjadi kesalahan');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_rate' => 'required',
            'id_tenor' => 'required',
            'biaya_admin' => 'required|numeric',
            'min_pinjaman' => 'required|numeric',
            'max_pinjaman' => 'required|numeric',
        ], [
            'id_rate.required' => 'Silahkan Pilih Salah Satu Rate',
            'id_tenor.required' => 'Silahkan Pilih Salah Satu Tenor',
            'biaya_admin.required' => 'Biaya Admin Wajib Diisi',
            'min_pinjaman.required' => 'Minimal Pinjaman Wajib Diisi',
            'max_pinjaman.required' => 'Maximal Pinjaman Wajib Diisi',
        ]);

        try {
            biayaAdmin::create([
                'id_rate' => $request->id_rate,
                'id_tenor' => $request->id_tenor,
                'biaya_admin' => $request->biaya_admin,
                'min_pinjaman' => $request->min_pinjaman,
                'max_pinjaman' => $request->max_pinjaman,
            ]);
            return redirect()->route('biayaAdmin.index')->with('success', 'Berhasil Menambahkan Biaya Admin');
        } catch (\Throwable $th) {
            return back()->with('error', 'Terjadi kesalahan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $data = biayaAdmin::findOrFail($id);
            return view('admin.biayaAdmin.edit', compact('data'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Terjadi kesalahan');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $data = biayaAdmin::findOrFail($id);
            $tenor = tenor::get();
            $rate = rate::get();
            return view('admin.biayaAdmin.edit', compact('data', 'tenor', 'rate'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Terjadi kesalahan');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_rate' => 'required',
            'id_tenor' => 'required',
            'biaya_admin' => 'required|numeric',
            'min_pinjaman' => 'required|numeric',
            'max_pinjaman' => 'required|numeric',
        ], [
            'id_rate.required' => 'Silahkan Pilih Salah Satu Rate',
            'id_tenor.required' => 'Silahkan Pilih Salah Satu Tenor',
            'biaya_admin.required' => 'Biaya Admin Wajib Diisi',
            'min_pinjaman.required' => 'Minimal Pinjaman Wajib Diisi',
            'max_pinjaman.required' => 'Maximal Pinjaman Wajib Diisi',
        ]);

        try {
            $data = biayaAdmin::findOrFail($id);
            $data->update([
                'id_rate' => $request->id_rate,
                'id_tenor' => $request->id_tenor,
                'biaya_admin' => $request->biaya_admin,
                'min_pinjaman' => $request->min_pinjaman,
                'max_pinjaman' => $request->max_pinjaman,
            ]);
            return redirect()->route('biayaAdmin.index')->with('success', 'Berhasil Mengubah Biaya Admin');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            // return back()->with('error', 'Terjadi kesalahan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            biayaAdmin::findOrFail($id)->delete();
            return back()->with('success', 'Berhasil Menghapus Data Biaya Admin');
        } catch (\Throwable $th) {
            return back()->with('error', 'Terjadi kesalahan');
        }
    }
}
