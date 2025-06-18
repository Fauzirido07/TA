@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h2 class="mb-4">Dashboard Guru</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('info'))
        <div class="alert alert-info">{{ session('info') }}</div>
    @endif

    <div class="row justify-content-center gy-3">
        <div class="col-md-4">
            <a href="{{ route('guru.asesmen.pilih') }}" class="btn btn-outline-primary w-100 p-3">
                🧠 Asesmen Siswa
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('guru.asesmen.daftar') }}" class="btn btn-outline-success w-100 p-3">
                📋 Lihat Detail Asesmen
            </a>
        </div>
    </div>
</div>
@endsection
