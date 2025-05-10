@extends('layouts.admin-layout')

@section('content')
    <h2>Daftar Pendaftar Beasiswa</h2>

    <table class="table table-bordered">
        <thead>
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
                    <td>{{ ucfirst($item->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
