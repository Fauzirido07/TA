@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-5 fw-bold">Dashboard Pendaftar</h2>

    <div class="row g-4 justify-content-center">
        {{-- Card 1 --}}
        <div class="col-12 col-sm-6 col-md-4">
            <a href="{{ route('daftar') }}" class="text-decoration-none">
                <div class="card shadow-sm h-100 border-success">
                    <div class="card-body text-center">
                        <div class="display-4 text-success mb-3">📄</div>
                        <h5 class="card-title text-success fw-semibold">Formulir Pendaftaran</h5>
                        <p class="card-text text-muted">Isi dan kirim formulir pendaftaran siswa baru.</p>
                    </div>
                </div>
            </a>
        </div>

        {{-- Card 2 --}}
        <div class="col-12 col-sm-6 col-md-4">
            <a href="{{ route('pendaftaran.saya') }}" class="text-decoration-none">
                <div class="card shadow-sm h-100 border-secondary">
                    <div class="card-body text-center">
                        <div class="display-4 text-secondary mb-3">📋</div>
                        <h5 class="card-title text-secondary fw-semibold">Lihat Pendaftaran Saya</h5>
                        <p class="card-text text-muted">Cek status dan detail pendaftaran Anda.</p>
                    </div>
                </div>
            </a>
        </div>

        {{-- Card 3 --}}
        <div class="col-12 col-sm-6 col-md-4">
            <a href="{{ route('prosedur') }}" class="text-decoration-none">
                <div class="card shadow-sm h-100 border-info">
                    <div class="card-body text-center">
                        <div class="display-4 text-info mb-3">📌</div>
                        <h5 class="card-title text-info fw-semibold">Prosedur Pendaftaran</h5>
                        <p class="card-text text-muted">Panduan lengkap proses pendaftaran siswa baru.</p>
                    </div>
                </div>
            </a>
        </div>

        {{-- Card 4 --}}
        <div class="col-12 col-sm-6 col-md-4">
            <a href="{{ route('jadwal') }}" class="text-decoration-none">
                <div class="card shadow-sm h-100 border-warning">
                    <div class="card-body text-center">
                        <div class="display-4 text-warning mb-3">🗓</div>
                        <h5 class="card-title text-warning fw-semibold">Jadwal Asesmen</h5>
                        <p class="card-text text-muted">Lihat jadwal asesmen dan persiapkan diri Anda.</p>
                    </div>
                </div>
            </a>
        </div>

        {{-- Card 5 --}}
        <div class="col-12 col-sm-6 col-md-4">
            <a href="{{ route('hasil') }}" class="text-decoration-none">
                <div class="card shadow-sm h-100 border-primary">
                    <div class="card-body text-center">
                        <div class="display-4 text-primary mb-3">📊</div>
                        <h5 class="card-title text-primary fw-semibold">Hasil Asesmen</h5>
                        <p class="card-text text-muted">Lihat hasil asesmen dan evaluasi pendaftaran.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
