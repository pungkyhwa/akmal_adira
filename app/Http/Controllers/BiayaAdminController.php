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
        try {

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

        } catch (\Throwable $th) {
            return back()->with('error', 'Terjadi kesalahan');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {

        } catch (\Throwable $th) {
            return back()->with('error', 'Terjadi kesalahan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

        } catch (\Throwable $th) {
            return back()->with('error', 'Terjadi kesalahan');
        }
    }
}
