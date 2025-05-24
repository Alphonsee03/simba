@extends('layouts.admin-layout')
@section('content')

<div class="mb-3 card-body bg-skyblue">
    <h2>SELAMAT DATANG {{ Auth::user()->name }}</h2>
</div>

<div class="row mb-4">
    <div class="col-4">
        <div class="card">
            <div class="card-body px-3 py-2">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <div class="stats-icon purple">
                            <i class="iconly-boldShow"></i>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h6 class="text-muted font-semibold">Data Mahasiswa</h6>
                        <h6 class="font-extrabold mb-0">{{ $totalMahasiswa }}</h6>
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
                        <h6 class="font-extrabold mb-0">{{ $totalPetugas }}</h6>
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
                        <h6 class="font-extrabold mb-0">{{ $totalAdmin }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    {{-- Pie Chart User --}}
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm h-100">
            <div class="card-header  text-white text-center" >Distribusi User</div>
            <div class="card-body d-flex justify-content-center align-items-center text-center" >
                <div class="chart-container-square">
                    <canvas id="userPieChart"
                        data-admin="{{ $totalAdmin }}"
                        data-petugas="{{ $totalPetugas }}"
                        data-mahasiswa="{{ $totalMahasiswa }}">
                    </canvas>
                </div>
            </div>
        </div>
    </div>

    {{-- Bar Chart Seleksi --}}
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm h-100">
            <div class="card-header  text-white text-center">Data Seleksi</div>
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
<style>




</style>
@endsection