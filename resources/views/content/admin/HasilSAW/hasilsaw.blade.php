@extends('layouts.admin-layout')

@section('content')
<h1>DAFTAR HASIL SELEKSI & RANGKING</h1>
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
