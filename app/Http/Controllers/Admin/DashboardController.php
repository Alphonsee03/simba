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
   // app/Http/Controllers/Admin/DashboardController.php
public function dashboard()
{
    $totalAdmin = User::where('role', 'admin')->count();
    $totalPetugas = User::where('role', 'petugas')->count();
    $totalMahasiswa = User::where('role', 'mahasiswa')->count();

    $totalBeasiswa = Beasiswa::count();
    $beasiswaTerakhir = Beasiswa::latest()->take(5)->get();

    $totalPendaftar = Pendaftaran::count();
    $totalDiterima = Pendaftaran::where('status', 'diterima')->count();

    return view('content.admin.dashboard', compact(
        'totalAdmin',
        'totalPetugas',
        'totalMahasiswa',
        'totalBeasiswa',
        'beasiswaTerakhir',
        'totalPendaftar',
        'totalDiterima'
    ));
}

}
