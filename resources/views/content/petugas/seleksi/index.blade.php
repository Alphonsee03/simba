@extends('layouts.petugas-layout') 
@section('content')

<form method="GET" action="{{ route('petugas.seleksi.index') }}">
    <div class="mb-3">
        <label for="beasiswa_id" class="form-label d-block text-center">Pilih Beasiswa:</label>
        <select name="beasiswa_id" id="beasiswa_id" class="form-select mx-auto" required>
            <option value="">-- Pilih Beasiswa --</option>
            @foreach ($beasiswas as $beasiswa)
                <option value="{{ $beasiswa->id }}" {{ request('beasiswa_id') == $beasiswa->id ? 'selected' : '' }}>
                    {{ $beasiswa->nama }}
                </option>
            @endforeach
        </select>
    </div>
    <a href="#" onclick="prosesSeleksi()" class="btn btn-primary px-4">Proses Seleksi SAW</a>
</form>

<script>
function prosesSeleksi() {
    const selectedId = document.getElementById('beasiswa_id').value;
    if (!selectedId) {
        alert('Pilih beasiswa terlebih dahulu');
        return;
    }
    window.location.href = '/petugas/seleksi/' + selectedId;
}
</script>

@if(session('success'))
    <div class="alert alert-success mb-4">{{ session('success') }}</div>
@endif



<div class="table-responsive shadow rounded">
    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th class="text-primary text-center">Rangking</th>
                <th class="text-primary">Nama</th>
                <th class="text-primary">Email</th>
                <th class="text-primary text-center">Nilai Akhir</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($penilaians as $i => $item)
                <tr>
                    <td class="text-center">{{ $i + 1 }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->user->email }}</td>
                    <td class="text-center">{{ number_format($item->nilai_akhir, 4) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada data seleksi</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

