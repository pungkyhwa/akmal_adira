<?php

namespace App\Http\Controllers;

use App\Models\asuransiRate;
use App\Models\biayaAdmin;
use App\Models\biayaMitra;
use App\Models\clnNasabah;
use App\Models\hargaKendaraan;
use App\Models\jnsKendaraan;
use App\Models\merekKendaraan;
use App\Models\rate;
use App\Models\tahunKendaraan;
use App\Models\tenor;
use App\Models\tipeKendaraan;
use Illuminate\Http\Request;

class SimulasiController extends Controller
{
    public function index()
    {
        $jnsKendaraan = jnsKendaraan::get();
        $merkKendaraan = merekKendaraan::get();
        $thnKendaraan = tahunKendaraan::get();
        $tipeKendaraan = tipeKendaraan::get();
        $tenor = tenor::get();
        return view('landingPage.simulasi.index', compact('jnsKendaraan', 'merkKendaraan', 'thnKendaraan', 'tipeKendaraan', 'tenor'));
    }

    public function storeSimulasi(Request $request)
    {

        function pmt($rate, $nper, $pv, $fv = 0, $type = 0)
        {
            if ($rate == 0) {
                return -($pv + $fv) / $nper;
            } else {
                return -($rate * ($fv + $pv * pow(1 + $rate, $nper))) /
                    ((1 + $rate * $type) * (pow(1 + $rate, $nper) - 1));
            }
        }

        $hargaKendaraan = str_replace('.', '', $request->input('hargaKendaraan')); //
        $maximalPencairan = str_replace('.', '', $request->input('maksPencairan'));
        $tenor = tenor::where('id', $request->tenor)->first();
        $biayaAdmin = biayaAdmin::where('id_tenor', $request->tenor)->first();
        $biayaMitra = biayaMitra::where('id_tenor', $request->tenor)->first();
        $rate = rate::where('id', $biayaAdmin->id_rate)->first();
        $uangMuka = $hargaKendaraan - $maximalPencairan;
        $rateAsuransi = asuransiRate::where('id', $tenor->id_asuransi_rate)->first();
        $biayaAsuransi = $rateAsuransi;

        // Hitung PV (pokok pinjaman bersih)
        $pv = $hargaKendaraan - ($uangMuka - $biayaAdmin->biaya_admin - $biayaMitra->biaya_mitra - $biayaAsuransi->asuransi_rate);

        // Hitung bunga bulanan
        $rateBulanan = $rate->rate / 1200;

        // Hitung angsuran
        $angsuran = pmt($rateBulanan, $tenor->tenor, -$pv);
        $angsuran = ceil($angsuran / 1000) * 1000;

        // Output hasil
        $results = [
            'maksimal_pencairan' => number_format($maximalPencairan, 0, ',', '.'),
            'pokok_pinjaman' => number_format($pv, 0, ',', '.'),
            'angsuran_per_bulan' => number_format($angsuran, 0, ',', '.'),
            'hargaKendaraan' => $hargaKendaraan
        ];

        session(['simulasi_results' => $results]);

        return back()->with(['success' => true, 'results' => $results]);
    }

    public function dataCalonNasabah()
    {
        try {
            $tenor = tenor::get();
            $merkKendaraan = merekKendaraan::get();
            $tahunKendaraan = tahunKendaraan::get();
            return view('landingPage.simulasi.dataCalonPeminjam', compact('tenor', 'merkKendaraan'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Terjadi Kesalahan');
        }
    }

    public function storeDataCalonNasabah(Request $request)
    {
        $request->validate([
            'jumlah_pinjaman' => 'required',
            'nik' => 'required',
            'nohp' => 'required',
            'email' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'alamat' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'nm_ibu' => 'required',
            'tgl_janji' => 'required',
            'merk_kendaraan' => 'required',
            'thn_kendaraan' => 'required',
            'tenor' => 'required',
            'pekerjaan' => 'required',
            'lama_bekerja' => 'required',
            'plat_kendaraan' => 'required',
            'foto_ktp' => 'required',
            'foto_stnk' => 'required',
            'voucher' => 'required',
        ]);

        try {

            $jumlahPinjaman = str_replace(['Rp. ', '.'], '', $request->jumlah_pinjaman);
            clnNasabah::create([
                'jumlah_pinjaman' => $jumlahPinjaman,
                'nik' => $request->nik,
                'nohp' => $request->nohp,
                'email' => $request->email,
                'provinsi' => $request->provinsi,
                'kota' => $request->kota,
                'kecamatan' => $request->kecamatan,
                'kelurahan' => $request->kelurahan,
                'alamat' => $request->alamat,
                'tmp_lahir' => $request->tmp_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'nm_ibu' => $request->nm_ibu,
                'tgl_janji' => $request->tgl_janji,
                'merk_kendaraan' => $request->merk_kendaraan,
                'thn_kendaraan' => $request->thn_kendaraan,
                'tenor' => $request->tenor,
                'pekerjaan' => $request->pekerjaan,
                'lama_bekerja' => $request->lama_bekerja,
                'plat_kendaraan' => $request->plat_kendaraan,
                'foto_ktp' => $request->foto_ktp,
                'foto_stnk' => $request->foto_stnk,
                'voucher' => $request->voucher,
            ]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            // return back()->with('error', 'Terjadi Kesalahan');
        }
    }


}
