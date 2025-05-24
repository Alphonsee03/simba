@extends('layouts.admin-layout')

@section('content')
<div class="container mt-4">
    <h4>Input Kriteria untuk Beasiswa: <strong>{{ $beasiswa->nama }}</strong></h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.kriteria.store', $beasiswa->id) }}" method="POST">
        @csrf

        <div id="kriteria-container">
            <div class="row g-3 mb-3 kriteria-group">
                <div class="col-md-4">
                    <input type="text" name="kriteria[0][nama_kriteria]" class="form-control" placeholder="Nama Kriteria" required>
                </div>
                <div class="col-md-3">
                    <input type="number" name="kriteria[0][bobot]" class="form-control" placeholder="Bobot" step="0.01" required>
                </div>
                <div class="col-md-3">
                    <select name="kriteria[0][atribut]" class="form-select" required>
                        <option value="">Pilih Atribut</option>
                        <option value="benefit">Benefit</option>
                        <option value="cost">Cost</option>
                    </select>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-secondary mb-3" onclick="tambahKriteria()">+ Tambah Kriteria</button>

        <br>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<script>
let index = 1;

function tambahKriteria() {
    const container = document.getElementById('kriteria-container');
    const html = `
        <div class="row g-3 mb-3 kriteria-group">
            <div class="col-md-4">
                <input type="text" name="kriteria[${index}][nama_kriteria]" class="form-control" placeholder="Nama Kriteria" required>
            </div>
            <div class="col-md-3">
                <input type="number" name="kriteria[${index}][bobot]" class="form-control" placeholder="Bobot" step="0.01" required>
            </div>
            <div class="col-md-3">
                <select name="kriteria[${index}][atribut]" class="form-select" required>
                    <option value="">Pilih Atribut</option>
                    <option value="benefit">Benefit</option>
                    <option value="cost">Cost</option>
                </select>
            </div>
        </div>
    `;
    container.insertAdjacentHTML('beforeend', html);
    index++;
}
</script>
@endsection
