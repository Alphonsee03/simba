@extends('layouts.mahasiswa-layout')

@section('content')

    <div class="page-title">
        <h3>Dashboard Mahasiswa</h3>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                Selamat datang, {{ Auth::user()->name }}
            </div>
        </div>
    </section>
@endsection
