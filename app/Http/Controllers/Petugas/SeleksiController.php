<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\Alternatif;
use App\Models\Penilaian;
use App\Models\Beasiswa;
use App\Models\Pendaftaran;
use Barryvdh\DomPDF\Facade\Pdf;

class SeleksiController extends Controller
{
    public function prosesSeleksi($beasiswa_id)
    {

        if (!$beasiswa_id) {
            return redirect()->back()->with('error', 'Beasiswa belum dipilih.');
        }

        $kriterias = Kriteria::all();

        // Ambil hanya alternatif milik mahasiswa dari beasiswa ini dan status 'diterima'
        $alternatifs = Alternatif::whereHas('user', function ($q) use ($beasiswa_id) {
            $q->where('role', 'mahasiswa')
                ->whereHas('pendaftaran', function ($q2) use ($beasiswa_id) {
                    $q2->where('status', 'diterima')
                        ->where('beasiswa_id', $beasiswa_id);
                });
        })->get();

        $data_nilai = [];
        foreach ($alternatifs as $alt) {
            $data_nilai[$alt->user_id][$alt->kriteria_id] = $alt->nilai;
        }

        $nilai_akhir = [];
        foreach ($data_nilai as $user_id => $nilai_per_kriteria) {
            $total = 0;
            foreach ($kriterias as $kriteria) {
                $id_k = $kriteria->id;
                $bobot = $kriteria->bobot;

                $nilai_kriteria = array_column($data_nilai, $id_k);
                $nilai_kriteria = array_filter($nilai_kriteria);

                $max = max($nilai_kriteria);
                $min = min($nilai_kriteria);
                $nilai = $nilai_per_kriteria[$id_k] ?? 0;

                if ($kriteria->atribut == 'benefit') {
                    $ternormalisasi = $max > 0 ? $nilai / $max : 0;
                } else {
                    $ternormalisasi = $nilai > 0 ? $min / $nilai : 0;
                }

                $total += $ternormalisasi * $bobot;
            }

            $nilai_akhir[$user_id] = $total;
        }

        // Simpan nilai ke tabel penilaians
        foreach ($nilai_akhir as $user_id => $nilai) {
            if ($beasiswa_id && $user_id) {
                Penilaian::updateOrCreate(
                    ['user_id' => $user_id, 'beasiswa_id' => $beasiswa_id],
                    ['nilai_akhir' => $nilai]
                );
            }
        }

        return redirect()->route('petugas.seleksi.index', ['beasiswa_id' => $beasiswa_id])
            ->with('success', 'Proses seleksi SAW berhasil diselesaikan.');
    }

    public function store(Request $request)
    {
        $user_id = auth('mahasiswa')->id(); // mahasiswa yang sedang login
        $beasiswa_id = $request->input('beasiswa_id');

        // Cek apakah sudah pernah mendaftar beasiswa ini
        $sudahDaftar = Pendaftaran::where('user_id', $user_id)
            ->where('beasiswa_id', $beasiswa_id)
            ->exists();

        if ($sudahDaftar) {
            return redirect()->back()->with('error', 'Anda sudah pernah mendaftar pada beasiswa ini.');
        }

        // Jika belum, lanjut simpan
        Pendaftaran::create([
            'user_id' => $user_id,
            'beasiswa_id' => $beasiswa_id,
            'status' => 'menunggu', // atau status awal sesuai sistem Anda
        ]);

        return redirect()->back()->with('success', 'Pendaftaran berhasil dikirim.');
    }
}
