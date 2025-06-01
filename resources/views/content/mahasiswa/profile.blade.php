@extends('layouts.mahasiswa-layout')

@section('content')
<div class="container d-flex justify-content-center flex-wrap gap-4 mt-4">
    {{-- Card Profil Mahasiswa --}}
    <div class="mahasiswa-profile card shadow-sm p-3 flex-fill" style="max-width: 600px; min-width:300px; min-height: 320px;">
        <div class="card-header bg-primary text-white fw-bold fs-5 text-center">
            Profil Mahasiswa
        </div>
        <ul class="list-group list-group-flush mt-2">
            <li class="list-group-item d-flex align-items-center gap-2">
                <i class="bi bi-person-fill text-primary" aria-hidden="true"></i>
                <span class="label">Nama:</span>
                <span class="value flex-grow-1 fw-semibold text-truncate" title="Nama Lengkap Mahasiswa">{{ $mahasiswa->name }}</span>
            </li>
            <li class="list-group-item d-flex align-items-center gap-2">
                <i class="bi bi-envelope-fill text-primary" aria-hidden="true"></i>
                <span class="label">Email:</span>
                <span class="value flex-grow-1 text-truncate" title="Email Mahasiswa">{{ $mahasiswa->email }}</span>
            </li>
            <li class="list-group-item d-flex align-items-center gap-2">
                <i class="bi bi-mortarboard-fill text-primary" aria-hidden="true"></i>
                <span class="label">Prodi:</span>
                <span class="value flex-grow-1 fw-semibold" title="Program Studi">{{ $mahasiswa->prodi }}</span>
            </li>
            <li class="list-group-item d-flex align-items-center gap-2">
                <i class="bi bi-calendar2-event-fill text-primary" aria-hidden="true"></i>
                <span class="label">Semester:</span>
                <span class="value flex-grow-1" title="Semester Saat Ini">{{ $mahasiswa->smester }}</span>
            </li>
        </ul>
    </div>

    {{-- Daftar Beasiswa --}}
    <div class="beasiswa-list flex-fill" style="max-width: 600px; min-width:300px;">
        @forelse ($pendaftaran as $daftar)
            <div class="card mb-3" style="min-height: 130px;">
                <div class="card-header d-flex justify-content-between text-white">
                    <span><strong>{{ $daftar->beasiswa->nama }}</strong></span>
                    <span class="badge 
                        @if($daftar->status == 'diterima') bg-success 
                        @elseif($daftar->status == 'ditolak') bg-danger 
                        @else bg-warning text-dark @endif">
                        {{ ucfirst($daftar->status) }}
                    </span>
                </div>
                <div class="card-body">
                    <p><strong>Deskripsi:</strong> {{ $daftar->beasiswa->deskripsi }}</p>
                    @if($daftar->status == 'diterima' && $daftar->nilai_akhir)
                        <p><strong>Nilai Akhir:</strong> {{ number_format($daftar->nilai_akhir, 2) }}</p>
                    @endif
                </div>
            </div>
        @empty
            <div class="alert alert-info">Belum ada beasiswa yang didaftarkan.</div>
        @endforelse
    </div>
</div>

<style>
    /* Scoped styling */
    .mahasiswa-profile, .beasiswa-list {
        background: linear-gradient(135deg, #f0f4f8, #d9e4f5);
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(90, 91, 221, 0.15);
        padding: 1rem 1.25rem;
    }

    .mahasiswa-profile .card-header, .beasiswa-list h3 {
        color: #5a5bdd;
    }

    .mahasiswa-profile .label {
        min-width: 70px;
        color: #3b4cca;
        user-select: none;
    }

    .mahasiswa-profile .value {
        color: #222;
    }

    .mahasiswa-profile .list-group-item {
        font-size: 1rem;
        padding: 0.75rem 0.75rem;
        gap: 0.5rem;
    }

    /* Membuat teks terpotong agar rapi */
    .text-truncate {
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }
</style>

@endsection
