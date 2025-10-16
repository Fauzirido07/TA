@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-5 fw-bold">Dashboard Admin</h2>

    <div class="row g-4 justify-content-center">
        {{-- Jadwal Asesmen --}}
        <div class="col-12 col-sm-6 col-md-4">
            <a href="{{ route('admin.jadwal') }}" class="text-decoration-none">
                <div class="card shadow-sm h-100 border-warning">
                    <div class="card-body text-center">
                        <div class="display-4 text-warning mb-3">🗓</div>
                        <h5 class="card-title text-warning fw-semibold">Kelola Jadwal Asesmen</h5>
                        <p class="card-text text-muted">Atur jadwal asesmen bagi pendaftar.</p>
                    </div>
                </div>
            </a>
        </div>

        {{-- Manajemen Guru & Staff --}}
        <div class="col-12 col-sm-6 col-md-4">
            <a href="{{ route('admin.users') }}" class="text-decoration-none">
                <div class="card shadow-sm h-100 border-primary">
                    <div class="card-body text-center">
                        <div class="display-4 text-primary mb-3">👥</div>
                        <h5 class="card-title text-primary fw-semibold">Manajemen Guru & Staff</h5>
                        <p class="card-text text-muted">Kelola data guru dan staff sekolah.</p>
                    </div>
                </div>
            </a>
        </div>

        {{-- Prosedur Pendaftaran --}}
        <div class="col-12 col-sm-6 col-md-4">
            <a href="{{ route('admin.prosedur') }}" class="text-decoration-none">
                <div class="card shadow-sm h-100 border-info">
                    <div class="card-body text-center">
                        <div class="display-4 text-info mb-3">📌</div>
                        <h5 class="card-title text-info fw-semibold">Kelola Prosedur Pendaftaran</h5>
                        <p class="card-text text-muted">Atur panduan dan alur pendaftaran siswa.</p>
                    </div>
                </div>
            </a>
        </div>

        {{-- Monitoring Asesmen --}}
        <div class="col-12 col-sm-6 col-md-4">
            <a href="{{ route('admin.chart') }}" class="text-decoration-none">
                <div class="card shadow-sm h-100 border-success">
                    <div class="card-body text-center">
                        <div class="display-4 text-success mb-3">📈</div>
                        <h5 class="card-title text-success fw-semibold">Monitoring Asesmen</h5>
                        <p class="card-text text-muted">Lihat statistik dan laporan asesmen.</p>
                    </div>
                </div>
            </a>
        </div>

        {{-- Manajemen Pendaftar --}}
        <div class="col-12 col-sm-6 col-md-4">
            <a href="{{ route('admin.pendaftar') }}" class="text-decoration-none">
                <div class="card shadow-sm h-100 border-danger">
                    <div class="card-body text-center">
                        <div class="display-4 text-danger mb-3">📋</div>
                        <h5 class="card-title text-danger fw-semibold">Manajemen Pendaftar</h5>
                        <p class="card-text text-muted">Lihat dan ubah status pendaftar.</p>
                    </div>
                </div>
            </a>
        </div>

        {{-- Ubah Form Asesmen --}}
        <div class="col-12 col-sm-6 col-md-4">
            <a href="{{ route('admin.ubah_asesmen.index') }}" class="text-decoration-none">
                <div class="card shadow-sm h-100 border-secondary">
                    <div class="card-body text-center">
                        <div class="display-4 text-secondary mb-3">🧩</div>
                        <h5 class="card-title text-secondary fw-semibold">Ubah Form Asesmen</h5>
                        <p class="card-text text-muted">Kelola pertanyaan dan format asesmen.</p>
                    </div>
                </div>
            </a>
        </div>                        

    </div>
</div>
@endsection
