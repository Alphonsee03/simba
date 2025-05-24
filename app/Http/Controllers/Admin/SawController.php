<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penilaian;

class SawController extends Controller
{

    public function index()
    {
        $penilaians = Penilaian::with('user')
            ->orderByDesc('nilai_akhir')
            ->take(10)
            ->get();

        return view('content.admin.HasilSAW.hasilsaw', compact('penilaians'));
    }
}
