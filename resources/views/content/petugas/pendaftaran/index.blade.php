@extends('layouts.petugas-layout')

@section('content')
    <h2>Verifikasi Pendaftaran Beasiswa</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Mahasiswa</th>
                <th>Beasiswa</th>
                <th>Tanggal Daftar</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pendaftar as $item)
                <tr>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->beasiswa->nama }}</td>
                    <td>{{ $item->tanggal_daftar }}</td>
                    <td>{{ ucfirst($item->status) }}</td>
                    <td>
                        @if ($item->status == 'pending')
                            <form method="POST" action="{{ route('petugas.pendaftaran.update', [$item->id, 'diterima']) }}" style="display:inline">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-success btn-sm">Terima</button>
                            </form>

                            <form method="POST" action="{{ route('petugas.pendaftaran.update', [$item->id, 'ditolak']) }}" style="display:inline">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-danger btn-sm">Tolak</button>
                            </form>
                        @else
                            <span class="text-muted">Sudah diverifikasi</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
