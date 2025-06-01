@extends('layouts.admin-layout')

@section('content')
<div class="mb-3 card-body bg-skyblue">
    <h2>Riwayat Pendaftar Beasiswa</h2>
</div>

<div class="card shadow mb-4" >
    <div class="card-body p-2" >
        <div class="table-responsive" >
            <table class="table table-bordered table-striped mb-0 text-center">
                <thead style="background-color: #ddfef8; color:black;">
                    <tr>
                        <th>Nama Mahasiswa</th>
                        <th>Beasiswa</th>
                        <th>Tanggal Daftar</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendaftar as $item)
                    <tr>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->beasiswa->nama }}</td>
                        <td>{{ $item->tanggal_daftar }}</td>
                        <td class="{{ $item->status == 'diterima' ? 'text-success fw-bold' : ($item->status == 'ditolak' ? 'text-danger fw-bold' : 'text-warning fw-bold') }}">
                            {{ ucfirst($item->status) }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection