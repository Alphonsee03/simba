@extends('layouts.mahasiswa-layout')

@section('content')
<div class="container mb-4">
    <span class="navbar-brand mb-0 h1">Selamat Datang, {{ Auth::user()->name }}</span>
</div>

<div class="container">

    {{-- Informasi Utama --}}
    <div class="card mb-4">
        <div class="card-header  bg-primary ">
            <h4 class="card-title text-white ">Sistem Informasi Manajemen Beasiswa</h4>
        </div>
        <div class="card-body">
            <p>Selamat datang di SIMBA! Di sini kamu bisa melihat dan mendaftar beasiswa, memantau status pengajuanmu, dan melihat hasil seleksi secara real-time.</p>
        </div>
    </div>

    {{-- Statistik Pribadi --}}
<div class="row mb-4">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-info text-white">
                <i class="fas fa-user-plus"></i>
                Total Pendaftaran
            </div>
            <div class="card-body text-center">
                <h2>{{ $totalPendaftaran ?? 0 }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-success text-white">
                <i class="fas fa-check-circle"></i>
                Diterima
            </div>
            <div class="card-body text-center">
                <h2>{{ $jumlahDiterima ?? 0 }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-danger text-white">
                <i class="fas fa-times-circle"></i>
                Ditolak
            </div>
            <div class="card-body text-center">
                <h2>{{ $jumlahDitolak ?? 0 }}</h2>
            </div>
        </div>
    </div>
</div>


<div class="card mt-4">
    <div class="card-header bg-warning text-dark">
        <h5>Beasiswa yang Sedang Aktif</h5>
    </div>
    <div class="card-body">
        @if ($beasiswasAktif->count())
            <ul class="list-group">
                @foreach ($beasiswasAktif as $beasiswa)
                    <li class="list-group-item">
                        <strong>{{ $beasiswa->nama }}</strong><br>
                        Periode: {{ \Carbon\Carbon::parse($beasiswa->tanggal_mulai)->format('d M Y') }} - 
                        {{ \Carbon\Carbon::parse($beasiswa->tanggal_akhir)->format('d M Y') }}
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-muted">Tidak ada beasiswa aktif saat ini.</p>
        @endif
    </div>
</div>

<!-- Riwayat Pendaftaran -->
<div class="card mt-4">
    <div class="card-header bg-secondary text-white">
        <h5>Riwayat Pendaftaran Beasiswa</h5>
    </div>
    <div class="card-body">
        @if ($riwayat->count())
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Beasiswa</th>
                        <th>Status</th>
                        <th>Nilai Akhir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($riwayat as $data)
                        <tr>
                            <td>{{ $data->beasiswa->nama }}</td>
                            <td>
                                <span class="badge
                                    @if($data->status === 'diterima') bg-success
                                    @elseif($data->status === 'ditolak') bg-danger
                                    @else bg-warning
                                    @endif
                                ">
                                    {{ ucfirst($data->status) }}
                                </span>
                            </td>
                            <td>
                                {{ $data->status === 'diterima' && $data->penilaian ? $data->penilaian->nilai_akhir : '-' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-muted">Belum ada riwayat pendaftaran.</p>
        @endif
    </div>
</div>

</div>
@endsection
