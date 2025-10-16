@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-5 fw-bold">Dashboard Guru</h2>

    <div class="row g-4 justify-content-center">
        {{-- Card 1: Asesmen Siswa --}}
        <div class="col-12 col-sm-6 col-md-5 col-lg-4">
            <a href="{{ route('guru.asesmen.pilih') }}" class="text-decoration-none">
                <div class="card shadow-sm h-100 border-primary">
                    <div class="card-body text-center">
                        <div class="display-4 text-primary mb-3">🧠</div>
                        <h5 class="card-title text-primary fw-semibold">Asesmen Siswa</h5>
                        <p class="card-text text-muted">Beri penilaian kepada siswa berdasarkan hasil asesmen mereka.</p>
                    </div>
                </div>
            </a>
        </div>

        {{-- Card 2: Lihat Detail Asesmen --}}
        <div class="col-12 col-sm-6 col-md-5 col-lg-4">
            <a href="{{ route('guru.asesmen.daftar') }}" class="text-decoration-none">
                <div class="card shadow-sm h-100 border-success">
                    <div class="card-body text-center">
                        <div class="display-4 text-success mb-3">📋</div>
                        <h5 class="card-title text-success fw-semibold">Lihat Detail Asesmen</h5>
                        <p class="card-text text-muted">Tinjau daftar hasil asesmen yang telah dinilai.</p>
                    </div>
                </div>
            </a>
        </div>

        {{-- Card 3: Asesmen Dinamis --}}
        <div class="col-12 col-sm-6 col-md-5 col-lg-4">
            <a href="{{ route('guru.asesmen_dinamis.pilih') }}" class="text-decoration-none">
                <div class="card shadow-sm h-100 border-warning">
                    <div class="card-body text-center">
                        <div class="display-4 text-warning mb-3">🧩</div>
                        <h5 class="card-title text-warning fw-semibold">Asesmen Dinamis</h5>
                        <p class="card-text text-muted">Isi form asesmen dinamis untuk siswa tertentu.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
