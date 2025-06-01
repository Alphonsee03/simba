@extends('layouts.admin-layout')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Beasiswa</h1>
    <a href="{{ route('admin.beasiswas.create') }}" class="btn btn-primary mb-3">+ Tambah Beasiswa</a>

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive shadow rounded">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered mb-0 text-center">
                    <thead style="background-color: #ddfef8;">
                        <tr>
                            <th>NO</th>
                            <th>Nama Beasiswa</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Berakhir</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($beasiswas as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->tanggal_mulai }}</td>
                            <td>{{ $item->tanggal_akhir }}</td>
                            <td>
                                <a href="{{ route('admin.beasiswa.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('admin.beasiswa.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection