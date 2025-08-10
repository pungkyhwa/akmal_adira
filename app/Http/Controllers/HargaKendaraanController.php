<?php

namespace App\Http\Controllers;

use App\Models\hargaKendaraan;
use App\Models\jnsKendaraan;
use App\Models\merekKendaraan;
use App\Models\tahunKendaraan;
use App\Models\tipeKendaraan;
use Illuminate\Http\Request;

class HargaKendaraanController extends Controller
{
    public function index(Request $request)
    {
        $query = hargaKendaraan::query()->with('merekKendaraan','tipeKendaraan','jnsKendaraan','tahunKendaraan');

        // Jika ada input 'cari' dari form
        if ($request->has('cari') && $request->cari != '') {
            $search = $request->cari;
            $query->whereHas('merekKendaraan', function ($q) use ($search) {
                $q->where('merek_kendaraan', 'like', "%{$search}%");
            })
                ->orWhereHas('tipeKendaraan', function ($q) use ($search) {
                    $q->where('tipe_kendaraan', 'like', "%{$search}%");
                })
                ->orWhereHas('jnsKendaraan', function ($q) use ($search) {
                    $q->where('jns_kendaraan', 'like', "%{$search}%");
                })
                ->orWhereHas('tahunKendaraan', function ($q) use ($search) {
                    $q->where('tahun_kendaraan', 'like', "%{$search}%");
                })
                ->where('harga', 'like', "%{$search}%")
                ->where('aktif', 'like', "%{$search}%");
        }

        $data = $query->paginate(10);
        // dd($data);
        return view('admin.hargaKendaraan.index', compact('data'));
        // try {
        // } catch (\Throwable $th) {
        //     return back()->with('error', 'Terjadi kesalahan');
        // }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $merkKendaraan = merekKendaraan::get();
            $tipeKendaraan = tipeKendaraan::get();
            $jnsKendaraan = jnsKendaraan::get();
            $thnKendaraan = tahunKendaraan::get();
            return view('admin.hargaKendaraan.create', compact('merkKendaraan', 'tipeKendaraan', 'jnsKendaraan', 'thnKendaraan'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Terjadi kesalahan');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'id_merek_kendaraan' => 'required',
            'id_tipe_kendaraan' => 'required',
            'id_jns_kendaraan' => 'required',
            'id_tahun_kendaraan' => 'required',
            'harga' => 'required|numeric',
            'aktif' => 'required',
        ]);


        try {
            hargaKendaraan::create([
                'id_merek_kendaraan' => $request->id_merek_kendaraan,
                'id_tipe_kendaraan' => $request->id_tipe_kendaraan,
                'id_jns_kendaraan' => $request->id_jns_kendaraan,
                'id_tahun_kendaraan' => $request->id_tahun_kendaraan,
                'harga' => $request->harga,
                'aktif' => $request->aktif,
            ]);
            return redirect()->route('hargaKendaraan.index')->with('success', 'Berhasil Menambahkan Harga Kendaraan');
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
            $data = hargaKendaraan::findOrFail($id);
            return view('admin.hargaKendaraan.edit', compact('data'));
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
            $data = hargaKendaraan::findOrFail($id);
            $merkKendaraan = merekKendaraan::get();
            $tipeKendaraan = tipeKendaraan::get();
            $jnsKendaraan = jnsKendaraan::get();
            $thnKendaraan = tahunKendaraan::get();
            return view('admin.hargaKendaraan.edit', compact('data', 'merkKendaraan', 'tipeKendaraan', 'jnsKendaraan', 'thnKendaraan'));
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
            'id_merek_kendaraan' => 'required',
            'id_tipe_kendaraan' => 'required',
            'id_jns_kendaraan' => 'required',
            'id_tahun_kendaraan' => 'required',
            'harga' => 'required|numeric',
            'aktif' => 'required',
        ]);

        try {
            $data = hargaKendaraan::findOrFail($id);
            $data->update([
                'id_merek_kendaraan' => $request->id_merek_kendaraan,
                'id_tipe_kendaraan' => $request->id_tipe_kendaraan,
                'id_jns_kendaraan' => $request->id_jns_kendaraan,
                'id_tahun_kendaraan' => $request->id_tahun_kendaraan,
                'harga' => $request->harga,
                'aktif' => $request->aktif,
            ]);
            return redirect()->route('hargaKendaraan.index')->with('success', 'Berhasil Mengubah Harga Kendaraan');
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
            hargaKendaraan::findOrFail($id)->delete();
            return back()->with('success', 'Berhasil Menghapus Data Harga Kendaraan');
        } catch (\Throwable $th) {
            return back()->with('error', 'Terjadi kesalahan');
        }
    }
}
