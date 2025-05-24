<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\Alternatif;
use App\Models\Penilaian;
use App\Models\Beasiswa;
use App\Models\Pendaftaran;
use Barryvdh\DomPDF\Facade\Pdf;

class PetugasController extends Controller
{
    public function index(Request $request)
    {
        $beasiswas = Beasiswa::all();
        $beasiswa_id = $request->get('beasiswa_id');

        $penilaians = [];

        if ($beasiswa_id) {
            $penilaians = Penilaian::with('user')
                ->where('beasiswa_id', $beasiswa_id)
                ->orderByDesc('nilai_akhir')
                ->take(5)
                ->get();
        }

        return view('content.petugas.seleksi.index', compact('beasiswas', 'penilaians'));
    }

    public function exportPDF()
    {
        $penilaians = Penilaian::with('user')
            ->orderByDesc('nilai_akhir')
            ->take(5)
            ->get();

        $pdf = Pdf::loadView('content.petugas.seleksi.pdf', compact('penilaians'));
        return $pdf->download('hasil_seleksi.pdf');
    }

    public function daftarHasilSeleksi(Request $request)
    {
        $beasiswas = Beasiswa::all();
        $beasiswa_id = $request->get('beasiswa_id');

        $penilaians = collect();

        if ($beasiswa_id) {
            $penilaians = Penilaian::with(['user', 'beasiswa'])
                ->where('beasiswa_id', $beasiswa_id)
                ->orderByDesc('nilai_akhir')
                ->get()
                ->values(); // agar index konsisten
        }

        return view('content.petugas.seleksi.hasil', compact('beasiswas', 'penilaians', 'beasiswa_id'));
    }
}
