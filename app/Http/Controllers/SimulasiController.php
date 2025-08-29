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
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use function Laravel\Prompts\select;

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
        $hargaKendaraan = str_replace('.', '', $request->input('hargaKendaraan'));
        $terima_nasabah = str_replace('.', '', $request->input('maksPencairan'));
        $queryTenor = tenor::where('id', $request->tenor)->select('*')->first();
        $pilih_tenor = $queryTenor->tenor;
        // dd($pilih_tenor);

        $query = tenor::query()->with('asuransiRate');

        // mencari biaya admin dari tenor batas pencairan
        $queryBiayaAdmin = biayaAdmin::join('tenor', 'tenor.id', '=', 'biaya_admin.id_tenor')
            ->join('rate', 'rate.id', '=', 'biaya_admin.id_rate')
            ->select('biaya_admin.id', 'biaya_admin.id_tenor', 'biaya_admin.id_rate', 'biaya_admin.biaya_admin', 'biaya_admin.min_pinjaman', 'biaya_admin.max_pinjaman', 'tenor.tenor', 'rate.rate')
            ->where('tenor.tenor', $pilih_tenor)
            ->whereRaw($terima_nasabah . ' BETWEEN biaya_admin.min_pinjaman AND biaya_admin.max_pinjaman')
            ->first();
        $biayaAdmin = $queryBiayaAdmin->biaya_admin;
        $efektif_rate = $queryBiayaAdmin->rate;
        $queryBiayaMitra = biayaMitra::join('tenor', 'tenor.id', '=', 'biaya_mitra.id_tenor')->select('biaya_mitra.id', 'biaya_mitra.id_tenor', 'biaya_mitra.biaya_mitra', 'biaya_mitra.min_pinjaman', 'biaya_mitra.max_pinjaman', 'tenor.tenor')
            ->where('tenor.tenor', $pilih_tenor)
            ->whereRaw($terima_nasabah . ' BETWEEN biaya_mitra.min_pinjaman AND biaya_mitra.max_pinjaman')
            ->first();
        $biayaMitra = $queryBiayaMitra->biaya_mitra;

        $plofon_pinjaman = $terima_nasabah + $biayaMitra + $biayaAdmin;
        $dp = $hargaKendaraan - $plofon_pinjaman;
        $persen_dp = ($dp / $hargaKendaraan) * 100;
        $pokok_hutang = $hargaKendaraan - $dp;

        // cek asuransi rate dari tenor di database
        $rateAsuransiQuery = $query->where('tenor', $pilih_tenor)->first();
        $rateAsuransi = ($rateAsuransiQuery->asuransiRate->asuransi_rate);
        $nominal_rate_asuransi = ($hargaKendaraan * $rateAsuransi) / 100;
        $total_pokok_hutang = $pokok_hutang + $nominal_rate_asuransi;
        $persen_bunga = (($pilih_tenor * ($efektif_rate / 1200) / (1 - pow((1 + $efektif_rate / 1200), -$pilih_tenor))) - 1) * (1200 / $pilih_tenor);
        $nominal_bunga = ($persen_bunga / 1200) * $pilih_tenor * $total_pokok_hutang;
        $total_hutang = $total_pokok_hutang + $nominal_bunga;
        $angsuran = round(($total_hutang / $pilih_tenor) + 1000, -3);


        function hitungMaksimalTerimaNasabah($hargaKendaraan, $biayaAdmin, $biayaMitra, $minPersenDP = 21)
        {
            // Hitung minimal DP
            $dpMinimal = ($minPersenDP / 100) * $hargaKendaraan;
            // Hitung plafon pinjaman maksimal
            $plafonMaksimal = $hargaKendaraan - $dpMinimal;
            // Hitung maksimal terima nasabah
            $maksTerimaNasabah = $plafonMaksimal - ($biayaAdmin + $biayaMitra);
            // Jika hasil negatif, otomatis 0 (tidak bisa dicairkan)
            return max(0, $maksTerimaNasabah);
        }




        // cek persen dp
        if ($persen_dp < 21.00) {
            $minPersenDP = 21;
            // echo "ditolak <br>";
            $maksimalTerima = hitungMaksimalTerimaNasabah($hargaKendaraan, $biayaAdmin, $biayaMitra, $minPersenDP);
            // echo $maksimalTerima;
            $maks = [
                'maksimal_terima' => number_format($maksimalTerima, 0, ',', '.')
            ];

            return back()->with(['maks' => $maks]);
        } else {
            // echo "harga kendaraan = ".$hargaKendaraan."<br>";
            // echo "terima nasabah = ".$terima_nasabah."<br>";
            // echo "plafon pinjaman = ".$plofon_pinjaman."<br>";
            // echo "dp = ".$dp."<br>";
            // echo "persen dp = ".$persen_dp."<br>";
            // echo "angsuran = ".$angsuran."<br>";
            $results = [
                'maksimal_pencairan' => number_format($terima_nasabah, 0, ',', '.'),
                'pokok_pinjaman' => number_format($total_hutang, 0, ',', '.'),
                'angsuran_per_bulan' => number_format($angsuran, 0, ',', '.'),

            ];

            session([
                'simulasi_results' => [
                    'jumlahPinjaman' => $terima_nasabah,
                    'merkKendaraan' => $request->input('merkKendaraan'),
                    'thnKendaraan' => $request->input('thnKendaraan'),
                    'tipeKendaraan' => $request->input('tipeKendaraan'),
                    'hargaKendaraan' => $hargaKendaraan,
                    'plofon_pinjaman' => $plofon_pinjaman,
                    'maksimal_pencairan' => number_format($terima_nasabah, 0, ',', '.'),
                    'tenor' => $request->tenor,
                    'biayaAdmin' => $biayaAdmin,
                    'biayaMitra' => $biayaMitra,
                    'efektif_rate' => $efektif_rate,
                    'dp' => $dp,
                    'persen_dp' => $persen_dp,
                    'pokok_hutang' => $pokok_hutang,
                    'nominal_rate_asiransi' => $nominal_rate_asuransi,
                    'rateAsuransi' => $rateAsuransi,
                    'total_pokok_hutang' => $total_pokok_hutang,
                    'persen_bunga' => $persen_bunga,
                    'nominal_bunga' => $nominal_bunga,
                    'total_hutang' => $total_hutang,
                    'angsuran' => $angsuran
                ]
            ]);

            return back()->with(['success' => true, 'results' => $results]);


        }


        // echo "maksimal pencairan", $maximalPencairan, "<br>";
        // echo "Pokok Pinjaman: Rp " . number_format($pv, 0, ',', '.'), "<br>";
        // echo "Angsuran per bulan: Rp " . number_format($angsuran, 0, ',', '.');
    }

    public function dataCalonNasabah()
    {
        try {
            $jumlahPinjaman = session('simulasi_results.jumlahPinjaman');
            // dd($jumlahPinjaman['maksimal_pencairan']);
            $tenor = tenor::where('id', session('simulasi_results.tenor'))->first();
            $merkKendaraan = merekKendaraan::get();
            $tahunKendaraan = tahunKendaraan::get();
            return view('landingPage.simulasi.dataCalonPeminjam', compact('tenor', 'merkKendaraan', 'jumlahPinjaman'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Terjadi Kesalahan');
        }
    }

    public function storeDataCalonNasabah(Request $request)
    {
        // try {
            $request->validate([
                'jumlah_pinjaman' => 'required',
                'namaktp' => 'required',
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
                'tenor' => 'required',
                'pekerjaan' => 'required',
                'lama_bekerja' => 'required',
                'plat_kendaraan' => 'required',
                'foto_ktp' => 'required',
                'foto_stnk' => 'required',
                'foto_kk' => 'required',
            ]);

            $fotoKtp = $request->file('foto_ktp')->hashName();
            $request->file('foto_ktp')->move(public_path('fotoKtp'), $fotoKtp);

            $fotoStnkBpkb = $request->file('foto_stnk')->hashName();
            $request->file('foto_stnk')->move(public_path('fotoStnkBpkb'), $fotoStnkBpkb);

            $fotoKeluarga = $request->file('foto_kk')->hashName();
            $request->file('foto_kk')->move(public_path('fotoKK'), $fotoKeluarga);

            $jumlahPinjaman = str_replace(['Rp. ', '.'], '', $request->jumlah_pinjaman);
            $tenor = tenor::where('tenor', $request->tenor)->first();
            clnNasabah::create([
                'jumlah_pinjaman' => $jumlahPinjaman,
                'namaktp' => $request->namaktp,
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
                'merk_kendaraan' => session('simulasi_results.merkKendaraan'),
                'thn_kendaraan' => session('simulasi_results.thnKendaraan'),
                'tipe_kendaraan' => session('simulasi_results.tipeKendaraan'),
                'tenor' => $tenor,
                'pekerjaan' => $request->pekerjaan,
                'lama_bekerja' => $request->lama_bekerja,
                'plat_kendaraan' => $request->plat_kendaraan,
                'foto_ktp' => $fotoKtp,
                'foto_stnk' => $fotoStnkBpkb,
                'foto_kk' => $fotoKeluarga,
            ]);

            // kirim wa
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.fonnte.com/send',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array(
                    'target' => '82113751469',
                    'message' => 'Assalamulaikum..
                    Nama :  ' . $request->namaktp . '
                    whatapp : ' . $request->nohp . '
                    Tanggal Janji Survey : ' . $request->tgl_janji . '

                    Harga Kendaraan = ' . number_format(session('simulasi_results.hargaKendaraan'), 0, ',', '.') . ';
                    Terima Nasabah = ' . session('simulasi_results.maksimal_pencairan') . ';
                    Plafon Nasabah = ' . number_format(session('simulasi_results.plofon_pinjaman'), 0, ',', '.') . ';
                    Tenor dipilih = ' . session('simulasi_results.tenor') . ' bulan;
                    Biaya Admin = ' . number_format(session('simulasi_results.biayaADmin'), 0, ',', '.') . ';
                    fee Axi = ' . number_format(session('simulasi_results.biayaMitra'), 0, ',', '.') . ';
                    efektif rate = ' . session('simulasi_results.efektif_rate') . ';
                    dp = ' . number_format(session('simulasi_results.dp'), 0, ',', '.') . ';
                    persen dp = ' . session('simulasi_results.persen_dp') . ';
                    Pokok Hutang = ' . number_format(session('simulasi_results.pokok_hutang'), 0, ',', '.') . ';
                    asuransi rate = ' . session('simulasi_results.rateAsuransi') . ' nominal = ' . number_format(session('simulasi_results.nominal_rate_asuransi'), 0, ',', '.') . ';
                    Total Pokok Hutang = ' . number_format(session('simulasi_results.total_pokok_hutang'), 0, ',', '.') . ';
                    Persen Bunga = ' . session('simulasi_results.persen_bunga') . ';
                    Nominal Bunga = ' . number_format(session('simulasi_results.nominal_bunga'), 0, ',', '.') . ';
                    Total Hutang = ' . number_format(session('simulasi_results.total_hutang'), 0, ',', '.') . ';
                    Angsuran = ' . number_format(session('simulasi_results.angsuran'), 0, ',', '.') . '
                    ',

                ),
                CURLOPT_HTTPHEADER => array(
                    'Authorization: 9GdkPSi2b2W9zzQ1X2NC' //change TOKEN to your actual token
                ),
            ));
            $response = curl_exec($curl);

            return redirect()->route('simulasi.index');
        // } catch (\Throwable $th) {
        //     dd($th->getMessage());
        //     // return back()->with('error', 'Terjadi Kesalahan');
        // }
    }
}
