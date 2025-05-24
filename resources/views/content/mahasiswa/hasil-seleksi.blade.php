@extends('layouts.mahasiswa-layout')

@section('content')

<div class="container mt-4">
    @if(is_null($status))
        <div class="alert alert-info">Belum ada hasil seleksi untuk Anda saat ini.</div>
    @else
        <div class="result-box {{ $status == 'lolos' ? 'success' : 'failed' }}">
            <h4 class="text-center mb-3">
                {{ $status == 'lolos' ? '🎉 SELAMAT ANDA LOLOS BEASISWA!' : '😢 MOHON MAAF, ANDA BELUM LOLOS.' }}
            </h4>

            <p><strong>Nama:</strong> {{ Auth::user()->name }}</p>
            <p><strong>Nama Beasiswa:</strong> {{ $beasiswa->nama }}</p>
            <p><strong>Nilai Akhir:</strong> {{ number_format($nilai_akhir, 4) }}</p>
            <p><strong>Ranking:</strong> {{ $ranking }}</p>
        </div>
    @endif
</div>

@endsection
