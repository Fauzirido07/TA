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

    {{-- Carousel Brosur Statis 2 Gambar --}}
    <div id="brosurCarousel" class="carousel slide carousel-fade mb-4"
        data-bs-ride="carousel"
        data-bs-interval="3500">

        <div class="carousel-inner rounded-4 shadow-lg">

            <div class="carousel-item active">
                <img src="{{ asset('assets/images/brosur1.jpg') }}"
                    class="d-block w-100"
                    style="object-fit: contain; max-height: 100vh; width: auto;">
            </div>

            <div class="carousel-item">
                <img src="{{ asset('assets/images/brosur2.jpg') }}"
                    class="d-block w-100"
                    style="object-fit: contain; max-height: 100vh; width: auto;">
            </div>

        </div>

        <!-- Panah kiri -->
        <button class="carousel-control-prev" type="button"
                data-bs-target="#brosurCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"
                style="filter: brightness(0) invert(1);"></span>
        </button>

        <!-- Panah kanan -->
        <button class="carousel-control-next" type="button"
                data-bs-target="#brosurCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"
                style="filter: brightness(0) invert(1);"></span>
        </button>

        <!-- Bullet indikator -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#brosurCarousel" data-bs-slide-to="0"
                    class="active rounded-circle" style="width:10px; height:10px;"></button>
            <button type="button" data-bs-target="#brosurCarousel" data-bs-slide-to="1"
                    class="rounded-circle" style="width:10px; height:10px;"></button>
        </div>

    </div>


    <hr>

    {{-- Tentang Sekolah --}}
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

    {{-- Prosedur Pendaftaran --}}
    <div class="row justify-content-center mt-5">
        <div class="col-md-8 col-lg-7">
            <div class="card shadow-sm p-4 bg-light rounded-4">
                <h4 class="mb-3 fw-semibold text-primary">
                    <i class="bi bi-list-check me-2"></i> Prosedur Pendaftaran 
                </h4>

                <p class="text-secondary fs-5">
                    Silakan ikuti langkah-langkah berikut untuk melakukan pendaftaran di SLB-B Dharma Wanita Sidoarjo:
                </p>

                <ol class="text-secondary fs-5">
                    <li>Buat akun terlebih dahulu dengan menekan tombol <b>Daftar</b>, lalu mengisi nama, email Google, dan password.</li>
                    <li>Setelah membuat akun, lanjutkan dengan melakukan <b>Login</b> menggunakan akun yang sudah dibuat.</li>
                    <li>Setelah berhasil login, pengguna dapat mendaftar dengan memilih tombol <b>Formulir Pendaftaran</b> dan mengisi form.</li>
                    <li>Jika formulir sudah lengkap, pengguna dapat mengirim form tersebut lalu melanjutkan ke proses administrasi langsung ke SLB-B Dharma Wanita Sidoarjo.</li>
                    <li>Setelah administrasi selesai, pengguna dapat melakukan daftar ulang dengan menekan tombol <b>Daftar Ulang</b> dan mengupload dokumen yang diperlukan.</li>
                    <li>Setelah asesmen, pengguna dapat melihat hasil asesmen melalui tombol <b>Lihat Hasil Asesmen</b> dan dapat mengunduhnya melalui tombol <b>Cetak Hasil Asesmen</b>.</li>
                    <li>Pendaftaran selesai.</li>
                </ol>

                @if(!empty($prosedur) && !empty($prosedur->file_path))
                    <a href="{{ asset($prosedur->file_path) }}" class="btn btn-primary mt-3" target="_blank">
                        Lihat File Prosedur Lengkap
                    </a>
                @endif

            </div>
        </div>
    </div>

</div>

@endsection

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
<style>
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
