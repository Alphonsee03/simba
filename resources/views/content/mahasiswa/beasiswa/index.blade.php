@extends('layouts.mahasiswa-layout')

@section('content')

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif


<h2>Daftar Beasiswa Tersedia</h2>
@foreach ($beasiswa as $item)
<div class="card mb-3">
    <div class="card-body">
        <h3>{{ $item->nama }}</h3>
        <p>{{ $item->deskripsi }}</p>
        <form action="{{ route('mahasiswa.beasiswa.daftar', $item->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Daftar</button>
        </form>
    </div>
</div>
@endforeach
@endsection