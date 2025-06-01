@extends('layouts.admin-layout')
@section('content')

<div class="mb-4 card-body bg-skyblue d-inline-block">
    <h5>SELAMAT DATANG {{ Auth::user()->name }}</h5>
</div>

<div class="row mb-4">
    <div class="col-4">
        <div class="card ">
            <div class="card-body px-3 py-2">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <div class="stats-icon purple">
                            <i class="iconly-boldShow"></i>
                        </div>
                    </div>
                    <div class="col-md-8 ">
                        <h6 class="text-muted font-semibold">Data Mahasiswa</h6>
                        <h6 class="font-extrabold mb-0">{{ $mahasiswaCount }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-4">
        <div class="card">
            <div class="card-body px-3 py-2">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <div class="stats-icon blue">
                            <i class="iconly-boldProfile"></i>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h6 class="text-muted font-semibold">Data Petugas</h6>
                        <h6 class="font-extrabold mb-0">{{ $petugasCount }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-4">
        <div class="card">
            <div class="card-body px-3 py-2">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <div class="stats-icon green">
                            <i class="iconly-boldAdd-User"></i>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h6 class="text-muted font-semibold">Data Admin</h6>
                        <h6 class="font-extrabold mb-0">{{ $adminCount }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow-sm mb-4" >
    <div class="card-header bg-info text-white text-center">
        <h5 class="mb-0">Data Beasiswa dan Status Pendaftaran</h5>
    </div>
    <div class="card-body p-3">
        <div class="table-responsive mb-0 mt-3">
            <table class="table table-striped table-bordered align-middle">
                <thead class=" text-center text-white " style="background-color: #5a5bdd;">
                    <tr>
                        <th>No</th>
                        <th>Nama Beasiswa</th>
                        <th>Jumlah Pendaftar</th>
                        <th>Jumlah Diterima</th>
                        <th>Jumlah Ditolak</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($beasiswaStats as $index => $item)
                    <tr class="text-center">
                        <td>{{ $index + 1 }}</td>
                        <td class="text-start">{{ $item->nama_beasiswa }}</td>
                        <td class="table-success">{{ $item->jumlah_pendaftar }}</td>
                        <td class="table-warning">{{ $item->jumlah_diterima }}</td>
                        <td class="table-danger">{{ $item->jumlah_ditolak }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="row">

    <div class="col-md-6 mb-4">
        <div class="card shadow-sm h-100">
            <div class="card-header bg-primary text-white text-center">Distribusi Pendaftar Beasiswa</div>
            <div class="card-body d-flex justify-content-center align-items-center">
                <div class="chart-container-square">
                    <canvas id="beasiswaPieChart"
                        data-labels='@json($namaBeasiswa)'
                        data-values='@json($jumlahPendaftar)'>
                    </canvas>
                </div>
            </div>
        </div>
    </div>

    {{-- Bar Chart Seleksi --}}
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm h-100">
            <div class="card-header text-white text-center">Data Seleksi</div>
            <div class="card-body d-flex justify-content-center align-items-center text-center">
                <div class="chart-container">
                    <canvas id="pendaftarChart"
                        data-total="{{ $totalPendaftar }}"
                        data-diterima="{{ $totalDiterima }}">
                    </canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection