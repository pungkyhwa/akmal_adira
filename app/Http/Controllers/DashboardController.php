<?php

namespace App\Http\Controllers;

use App\Models\clnNasabah;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $totalCalonNasabah = clnNasabah::get()->count();
        $data = clnNasabah::orderByDesc('id')->paginate(10);

        $totalCalonNasabahBulanIni = clnNasabah::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();

        $visitor = [
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url' => $request->fullUrl(),
        ];

        $visitors = session('visitors', []);

        // cek apakah visitor sudah ada
        $exists = collect($visitors)->contains(function ($v) use ($visitor) {
            return $v['ip'] === $visitor['ip'] && $v['user_agent'] === $visitor['user_agent'];
        });

        // kalau belum ada, baru tambahkan
        if (!$exists) {
            $visitors[] = $visitor;
            session(['visitors' => $visitors]);
        }

        $totalPengunjung = count($visitors);

        // total pengunjung hari ini
        $today = date('Y-m-d');
        $visitorHariIni = collect($visitors)->where('date', $today)->count();

        return view('admin.dashboard', compact('totalCalonNasabah', 'data', 'visitorHariIni', 'totalCalonNasabahBulanIni'));
    }
}
