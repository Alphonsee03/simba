@extends('layouts.admin-layout')

@section('content')

<div class="mb-5 card-body bg-skyblue mt-1 pt-1  mb-0">
    <h1 class="mb-4 text-white ">DAFTAR HASIL SELEKSI & RANGKING</h1>
</div>
<div class="table-responsive shadow rounded" style="background-color: #ddfef8;">

    <div class="card ">
        <div class="card-body">
            <table class="table table-bordered table-striped mb-0 text-center">
                <thead style="background-color: #ddfef8; color: dark;">
                    <tr>
                        <th class="text-center">Rangking</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th class="text-center">Nilai Akhir</th>
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
    </div>
</div>
@endsection