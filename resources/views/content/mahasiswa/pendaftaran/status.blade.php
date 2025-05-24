@extends('layouts.mahasiswa-layout')

@section('content')
    <h2>Status Pendaftaran Beasiswa</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Beasiswa</th>
                <th>Tanggal Daftar</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pendaftaran as $item)
                <tr>
                    <td>{{ $item->beasiswa->nama }}</td>
                    <td>{{ $item->tanggal_daftar }}</td>
                    <td>
                        @if ($item->status === 'pending')
                            <span class="badge bg-warning text-dark">Menunggu</span>
                        @elseif ($item->status === 'diterima')
                            <span class="badge bg-success">Diterima</span>
                        @else
                            <span class="badge bg-danger">Ditolak</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
