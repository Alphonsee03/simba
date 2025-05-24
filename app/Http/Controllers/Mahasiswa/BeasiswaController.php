<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Beasiswa;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BeasiswaController extends Controller
{
    public function index()
    {
        $beasiswa = Beasiswa::all();
        return view('content.mahasiswa.beasiswa.index', compact('beasiswa'));
    }

    public function daftar($id)
    {
        $user = auth('mahasiswa')->user();
        

        // Cek apakah sudah mendaftar
        if (Pendaftaran::where('user_id', $user->id)->where('beasiswa_id', $id)->exists()) {
            return back()->with('error', 'Anda sudah mendaftar beasiswa ini.');
        }

        // Simpan pendaftaran baru
        Pendaftaran::create([
            'user_id' => $user->id,
            'beasiswa_id' => $id,
            'status' => 'pending',
            'tanggal_daftar' => Carbon::now()
        ]);

        // Redirect ke form alternatif
        return redirect()->route('mahasiswa.alternatif.form')
            ->with('success', 'Pendaftaran berhasil. Silakan isi data kriteria.');
    }


    public function status()
    {
        $pendaftaran = Pendaftaran::with('beasiswa')->where('user_id', Auth::id())->get();
        return view('content.mahasiswa.pendaftaran.status', compact('pendaftaran'));
    }
}
