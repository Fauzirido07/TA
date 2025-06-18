@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold mb-3">Selamat Datang di PPDB SLB-B Dharma Wanita Sidoarjo</h1>
        <p class="lead text-muted fs-5">
            Sistem Pendaftaran Online untuk Calon Peserta Didik Berkebutuhan Khusus
        </p>
    </div>

    {{-- Tombol aksi utama --}}
    <div class="d-flex justify-content-center gap-3 mb-5 flex-wrap">
        @guest
            <a href="{{ route('register') }}" class="btn btn-success btn-lg px-5 shadow-sm" style="min-width: 180px;">
                <i class="bi bi-person-plus-fill me-2"></i> Daftar Sekarang
            </a>
            <a href="{{ route('login') }}" class="btn btn-outline-primary btn-lg px-5 shadow-sm" style="min-width: 180px;">
                <i class="bi bi-box-arrow-in-right me-2"></i> Login
            </a>
        @endguest

        @auth
            @if(auth()->user()->role === 'pendaftar')
                <a href="{{ route('dashboard.pendaftar') }}" class="btn btn-primary btn-lg px-5 shadow-sm" style="min-width: 220px;">
                    <i class="bi bi-layout-text-sidebar-reverse me-2"></i> Dashboard Pendaftar
                </a>
            @elseif(auth()->user()->role === 'staff')
                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-lg px-5 shadow-sm" style="min-width: 220px;">
                    <i class="bi bi-gear-fill me-2"></i> Dashboard Admin
                </a>
            @elseif(auth()->user()->role === 'guru')
                <a href="{{ route('guru.dashboard') }}" class="btn btn-primary btn-lg px-5 shadow-sm" style="min-width: 220px;">
                    <i class="bi bi-journal-bookmark-fill me-2"></i> Dashboard Guru
                </a>
            @endif

            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="btn btn-danger btn-lg ms-3 px-5 shadow-sm" style="min-width: 120px;">
               <i class="bi bi-box-arrow-right me-2"></i> Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        @endauth
    </div>

    <hr>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8 col-lg-7">
            <div class="card shadow-sm p-4 bg-light rounded-4">
                <h4 class="mb-3 fw-semibold text-primary">
                    <i class="bi bi-building me-2"></i> Tentang Sekolah
                </h4>
                <p class="text-secondary fs-5">
                    SLB-B Dharma Wanita Sidoarjo melayani pendidikan untuk anak berkebutuhan khusus dengan pendekatan yang 
                    disesuaikan secara personal. Sistem ini memudahkan proses pendaftaran, asesmen, dan komunikasi secara digital, 
                    sehingga meningkatkan kualitas pelayanan dan kenyamanan bagi siswa dan orang tua.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
<style>
    /* Animasi masuk halus */
    .container {
        animation: fadeInUp 0.8s ease forwards;
        opacity: 0;
        transform: translateY(20px);
    }
    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endpush
