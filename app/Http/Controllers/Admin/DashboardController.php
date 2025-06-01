<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Beasiswa;
use App\Models\Pendaftaran;
use App\Models\Penilaian;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function dashboard()
{
    $adminCount = User::where('role', 'admin')->count();
    $petugasCount = User::where('role', 'petugas')->count();
    $mahasiswaCount = User::where('role', 'mahasiswa')->count();

    $totalBeasiswa = Beasiswa::count();
    $beasiswaTerakhir = Beasiswa::latest()->take(5)->get();

    $totalPendaftar = Pendaftaran::count();
    $totalDiterima = Pendaftaran::where('status', 'diterima')->count();

    // Ambil statistik jumlah pendaftar per beasiswa, termasuk diterima/ditolak
    $beasiswaStats = DB::table('beasiswas')
        ->leftJoin('pendaftaran_beasiswa', 'beasiswas.id', '=', 'pendaftaran_beasiswa.beasiswa_id')
        ->select(
            'beasiswas.id',
            'beasiswas.nama as nama_beasiswa',
            DB::raw('count(pendaftaran_beasiswa.id) as jumlah_pendaftar'),
            DB::raw("SUM(CASE WHEN pendaftaran_beasiswa.status = 'diterima' THEN 1 ELSE 0 END) as jumlah_diterima"),
            DB::raw("SUM(CASE WHEN pendaftaran_beasiswa.status = 'ditolak' THEN 1 ELSE 0 END) as jumlah_ditolak")
        )
        ->groupBy('beasiswas.id', 'beasiswas.nama')
        ->get();

    // Data untuk chart
    $namaBeasiswa = $beasiswaStats->pluck('nama_beasiswa');
    $jumlahPendaftar = $beasiswaStats->pluck('jumlah_pendaftar');

    return view('content.admin.dashboard', compact(
        'adminCount',
        'petugasCount',
        'mahasiswaCount',
        'totalBeasiswa',
        'beasiswaTerakhir',
        'totalPendaftar',
        'totalDiterima',
        'namaBeasiswa',
        'jumlahPendaftar',
        'beasiswaStats'
    ));
}
}
