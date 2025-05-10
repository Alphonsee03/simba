@extends('layouts.admin-layout')

@section('content')
<div class="container">
    <h4>Edit Beasiswa</h4>
    <form action="{{ route('admin.beasiswa.update', $beasiswa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Beasiswa</label>
            <input type="text" name="nama" value="{{ $beasiswa->nama }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" required>{{ $beasiswa->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" value="{{ $beasiswa->tanggal_mulai }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
            <input type="date" name="tanggal_akhir" value="{{ $beasiswa->tanggal_akhir }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
