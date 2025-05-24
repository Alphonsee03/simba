@extends('layouts.petugas-layout')
@section('content')

<h2 class="mb-4 fw-bold text-primary">Daftar Mahasiswa Terproses</h2>

<form method="GET" action="{{ route('petugas.seleksi.hasil') }}" class="mb-4">
    <label for="beasiswa_id" class="form-label">Pilih Beasiswa:</label>
    <div class="input-group">
        <select name="beasiswa_id" id="beasiswa_id" class="form-select" onchange="this.form.submit()" required>
            <option value="">-- Pilih Beasiswa --</option>
            @foreach ($beasiswas as $beasiswa)
            <option value="{{ $beasiswa->id }}" {{ $beasiswa_id == $beasiswa->id ? 'selected' : '' }}>
                {{ $beasiswa->nama }}
            </option>
            @endforeach
            <button type="submit" class="btn btn-primary">Tampilkan</button>
        </select>


    </div>
</form>

@if($penilaians->count() > 0)
<div class="table-responsive shadow rounded">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary fw-bold m-0">5 Besar Hasil Seleksi</h2>
        <a href="{{ route('petugas.seleksi.export.pdf') }}" class="btn btn-danger btn-sm">Export PDF</a>
    </div>
    <table class="table table-bordered table-hover">
        <thead class="table-light text-center">
            <tr>
                <th>Ranking</th>
                <th>Nama Pendaftar</th>
                <th>Email</th>
                <th>Nilai Akhir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penilaians as $index => $item)
            <tr>
                <td class="text-center fw-bold text-success">{{ $index + 1 }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->user->email }}</td>
                <td class="text-center">{{ number_format($item->nilai_akhir, 4) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@elseif($beasiswa_id)
<div class="alert alert-warning">Belum ada mahasiswa yang diproses untuk beasiswa ini.</div>
@endif

@endsection