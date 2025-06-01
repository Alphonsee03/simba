<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\Beasiswa;
use App\Models\Penilaian;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPendaftar = Pendaftaran::count();
        $totalDiterima = Pendaftaran::where('status', 'diterima')->count();
        $totalDitolak = Pendaftaran::where('status', 'ditolak')->count();
        $totalPending  = Pendaftaran::where('status', 'pending')->count();

        $totalBeasiswa = Beasiswa::count();

        $pendaftarTerbaru = Pendaftaran::with(['user', 'beasiswa'])
            ->latest()
            ->take(5)
            ->get();

        return view('content.petugas.dashboard', compact(
            'totalPendaftar',
            'totalDiterima',
            'totalDitolak',
            'totalPending',
            'totalBeasiswa',
            'pendaftarTerbaru'
        ));
    }
}
