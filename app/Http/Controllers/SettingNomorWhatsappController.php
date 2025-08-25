<?php

namespace App\Http\Controllers;

use App\Models\KontakWhatsapp;
use Illuminate\Http\Request;

class SettingNomorWhatsappController extends Controller
{
    public function index()
    {
        $data = KontakWhatsapp::orderByDesc('id')->paginate(10);
        return view('admin.kontakWhatsapp.index', compact('data'));
    }

    public function create()
    {
        return view('admin.kontakWhatsapp.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nomor_whatsapp' => 'required'
        ]);

        KontakWhatsapp::create([
            'nama' => $request->nama,
            'nomor_whatsapp' => $request->nomor_whatsapp,
        ]);

        return redirect()->route('settingNomorWhatsapp.index')->with('success', 'Berhasil Memasukkan Kontak Whatsapp');
    }

    public function edit($id)
    {
        $data = KontakWhatsapp::findOrFail($id);
        return view('admin.kontakWhatsapp.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'nomor_whatsapp' => 'required'
        ]);

        $data = KontakWhatsapp::findOrFail($id);
        $data->update([
            'nama' => $request->nama,
            'nomor_whatsapp' => $request->nomor_whatsapp,
        ]);

        return redirect()->route('settingNomorWhatsapp.index')->with('success', 'Berhasil Memasukkan Kontak Whatsapp');
    }

}
