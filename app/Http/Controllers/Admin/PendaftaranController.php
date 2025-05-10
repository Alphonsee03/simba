<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;

class PendaftaranController extends Controller
{
    public function index()
    {
        $pendaftar = Pendaftaran::with(['user', 'beasiswa'])->latest()->get();
        return view('content.admin.pendaftaran.index', compact('pendaftar'));
    }
}

