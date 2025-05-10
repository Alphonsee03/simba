<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;

class PendaftaranController extends Controller
{
    public function index()
    {
        $pendaftar = Pendaftaran::with(['user', 'beasiswa'])->latest()->get();
        return view('content.petugas.pendaftaran.index', compact('pendaftar'));
    }

    public function updateStatus(Pendaftaran $pendaftaran, $status)
    {
        if (!in_array($status, ['diterima', 'ditolak'])) {
            return redirect()->back()->with('error', 'Status tidak valid.');
        }

        $pendaftaran->update(['status' => $status]);

        return redirect()->back()->with('success', 'Status pendaftaran berhasil diperbarui.');
    }
}
