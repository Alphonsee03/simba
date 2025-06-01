<?php

namespace App\Http\Controllers\Mahasiswa;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\Alternatif;
use App\Models\Penilaian;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    public function alternatifForm()
    {
        $user = auth('mahasiswa')->user();

        // Ambil pendaftaran terbaru yang masih menunggu atau terverifikasi
        $pendaftaran = Pendaftaran::where('user_id', $user->id)
            ->whereIn('status', ['pending', 'terverifikasi'])
            ->latest()
            ->first();

        if (!$pendaftaran) {
            return redirect()->route('mahasiswa.beasiswa.index')
                ->with('error', 'Silakan daftar beasiswa terlebih dahulu.');
        }

        $beasiswaId = $pendaftaran->beasiswa_id;

        $kriterias = Kriteria::where('beasiswa_id', $beasiswaId)->get();

        $alternatifs = Alternatif::where('user_id', $user->id)
            ->where('beasiswa_id', $beasiswaId)
            ->get()
            ->keyBy('kriteria_id');

        // Cek apakah sudah mengisi semua kriteria


        return view('content.mahasiswa.alternatif.form', compact('kriterias', 'alternatifs', 'beasiswaId'));
    }


    public function alternatifStore(Request $request)
    {
        $userId = auth('mahasiswa')->id();
        $beasiswaId = $request->input('beasiswa_id');

        $kriterias = Kriteria::where('beasiswa_id', $beasiswaId)->get();

        foreach ($kriterias as $kriteria) {
            $nilai = $request->input("nilai.$kriteria->id");

            if ($nilai !== null) {
                Alternatif::updateOrCreate(
                    [
                        'user_id' => $userId,
                        'kriteria_id' => $kriteria->id,
                        'beasiswa_id' => $beasiswaId,
                    ],
                    ['nilai' => $nilai]
                );
            }
        }

        return redirect()->route('mahasiswa.dashboard.index')->with('success', 'Nilai kriteria berhasil disimpan.');
    }


    public function statusSeleksi()
    {
        $user = Auth::user();

        // Ambil penilaian berdasarkan user
        $penilaian = Penilaian::where('user_id', $user->id)
            ->with('beasiswa')
            ->orderByDesc('nilai_akhir')
            ->first();

        // Jika belum ada hasil seleksi
        if (!$penilaian) {
            return view('content.mahasiswa.hasil-seleksi', [
                'status' => null,
                'beasiswa' => null,
                'nilai_akhir' => null,
                'ranking' => null
            ]);
        }

        // Ambil seluruh penilaian untuk beasiswa yang sama dan hitung ranking
        $rankingList = Penilaian::where('beasiswa_id', $penilaian->beasiswa_id)
            ->orderByDesc('nilai_akhir')
            ->get();

        $ranking = $rankingList->search(function ($item) use ($user) {
            return $item->user_id == $user->id;
        }) + 1;

        // Misal aturan kelulusan: ranking <= 3 (3 besar)
        $status = $ranking <= 3 ? 'lolos' : 'tidak_lolos';

        return view('content.mahasiswa.hasil-seleksi', [
            'status' => $status,
            'beasiswa' => $penilaian->beasiswa,
            'nilai_akhir' => $penilaian->nilai_akhir,
            'ranking' => $ranking
        ]);
    }


    public function profile()
    {
        $mahasiswa = auth('mahasiswa')->user(); 

        $pendaftaran = Pendaftaran::with('beasiswa')
            ->where('user_id', $mahasiswa->id)
            ->get();

        return view('content.mahasiswa.profile', compact('mahasiswa', 'pendaftaran'));
    }
}
