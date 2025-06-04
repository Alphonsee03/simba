<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Beasiswa;
use App\Models\Pendaftaran;
use App\Models\Penilaian;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $totalPendaftaran = Pendaftaran::where('user_id', $userId)->count();
        $jumlahDiterima = Pendaftaran::where('user_id', $userId)->where('status', 'diterima')->count();
        $jumlahDitolak = Pendaftaran::where('user_id', $userId)->where('status', 'ditolak')->count();

        $beasiswasAktif = Beasiswa::whereDate('tanggal_mulai', '<=', Carbon::today())
        ->whereDate('tanggal_akhir', '>=', Carbon::today())
        ->get();

    // Riwayat Pendaftaran Mahasiswa
        $riwayat = Pendaftaran::with('beasiswa')
        ->where('user_id', $userId)
        ->orderBy('created_at', 'desc')
        ->get();

        return view('content.mahasiswa.dashboard', compact(
        'totalPendaftaran',
        'jumlahDiterima',
        'jumlahDitolak',
        'beasiswasAktif',
        'riwayat'
    ));
    }
}
