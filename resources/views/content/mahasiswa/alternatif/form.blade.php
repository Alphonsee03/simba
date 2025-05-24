@extends('layouts.mahasiswa-layout')

@section('content')
<div class="container mt-4">
    <h4>Form Pengisian Nilai Kriteria</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('mahasiswa.alternatif.store') }}" method="POST">
        @csrf
        
        @foreach($kriterias as $kriteria)
            <div class="mb-3">
                <label for="kriteria_{{ $kriteria->id }}">{{ $kriteria->nama_kriteria }}</label>
                <input type="number" name="nilai[{{ $kriteria->id }}]" step="0.01"
                    value="{{ $alternatifs[$kriteria->id]->nilai ?? '' }}"
                    class="form-control" required>
                <input type="hidden" name="beasiswa_id" value="{{ $beasiswaId }}">
            </div>
        @endforeach
       
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
