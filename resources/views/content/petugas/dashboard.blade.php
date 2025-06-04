@extends('layouts.petugas-layout')



@section('content')
<div class="container mt-4">
    <h4>Dashboard Petugas</h4>

    <div class="row mb-4 content-wrapper text-center">
        <div class="col-md-3">
            <div class="card  bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Pendaftar</h5>
                    <p class="card-text text-white h5">{{ $totalPendaftar }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card  bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Pending</h5>
                    <p class="card-text text-white h5">{{ $totalPending }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card  bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Diterima</h5>
                    <p class="card-text text-white h5">{{ $totalDiterima }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card  bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title">Ditolak</h5>
                    <p class="card-text text-white h5">{{ $totalDitolak }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header text-white">
            <strong>Pendaftar Terbaru</strong>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nama Mahasiswa</th>
                        <th>Beasiswa</th>
                        <th>Status</th>
                        <th>Tanggal Daftar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendaftarTerbaru as $pendaftaran)
                        <tr>
                            <td>{{ $pendaftaran->user->name }}</td>
                            <td>{{ $pendaftaran->beasiswa->nama }}</td>
                            <td>
                                <span class="badge bg-{{ $pendaftaran->status == 'diterima' ? 'success' : ($pendaftaran->status == 'ditolak' ? 'danger' : 'warning') }}">
                                    {{ ucfirst($pendaftaran->status) }}
                                </span>
                            </td>
                            <td>{{ $pendaftaran->created_at->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
