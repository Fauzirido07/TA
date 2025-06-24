<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'PPDB SLB-B Dharma Wanita')</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    {{-- Favicon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/logo.ico') }}" />
    @stack('styles')
</head>
<body class="d-flex flex-column min-vh-100">

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            @auth
            <button
                class="btn btn-light me-2"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasSidebar"
                aria-controls="offcanvasSidebar"
            >
                ☰
            </button>
            @endauth

            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <img
                    src="{{ asset('assets/images/logo.png') }}"
                    alt="Logo"
                    width="32"
                    height="32"
                    class="me-2"
                />
                PPDB SLB-B
            </a>

            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    @auth
                    <li class="nav-item">
                        <span class="nav-link">Halo, {{ Auth::user()->nama }}</span>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-sm btn-light">Logout</button>
                        </form>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Daftar</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    {{-- Notifikasi Session --}}
    <div class="container mt-3" style="max-width: 900px; margin: 0 auto;">
        @if(session('success'))
        <div class="alert alert-success text-center shadow-sm">
            {{ session('success') }}
        </div>
        @endif

        @if(session('info'))
        <div class="alert alert-info text-center shadow-sm">
            {{ session('info') }}
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger text-center shadow-sm">
            {{ session('error') }}
        </div>
        @endif
    </div>

    {{-- Sidebar Offcanvas --}}
    @auth
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasSidebar" aria-labelledby="offcanvasSidebarLabel">
        <div class="offcanvas-header bg-primary text-white">
            <h5 class="offcanvas-title" id="offcanvasSidebarLabel">
                Menu {{ ucfirst(Auth::user()->role) }}
            </h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="list-group list-group-flush">
                @if(Auth::user()->role === 'pendaftar')
                    <a href="{{ route('dashboard.pendaftar') }}" class="list-group-item list-group-item-action">🏠 Dashboard</a>
                    <a href="{{ route('daftar') }}" class="list-group-item list-group-item-action">📄 Formulir Pendaftaran</a>
                    <a href="{{ route('pendaftaran.saya') }}" class="list-group-item list-group-item-action">📋 Lihat Pendaftaran Saya</a>
                    <a href="{{ route('prosedur') }}" class="list-group-item list-group-item-action">📌 Prosedur Pendaftaran</a>
                    <a href="{{ route('jadwal') }}" class="list-group-item list-group-item-action">🗓 Jadwal Asesmen</a>
                    <a href="{{ route('hasil') }}" class="list-group-item list-group-item-action">📊 Hasil Asesmen</a>
                @elseif(Auth::user()->role === 'staff' || Auth::user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action">🏠 Dashboard</a>
                    <a href="{{ route('admin.jadwal.create') }}" class="list-group-item list-group-item-action">📆 Jadwal</a>
                    <a href="{{ route('admin.users') }}" class="list-group-item list-group-item-action">👥 Pengguna</a>
                    <a href="{{ route('admin.prosedur') }}" class="list-group-item list-group-item-action">📋 Prosedur</a>
                    <a href="{{ route('admin.chart') }}" class="list-group-item list-group-item-action">📊 Grafik</a>
                @elseif(Auth::user()->role === 'guru')
                    <a href="{{ route('guru.dashboard') }}" class="list-group-item list-group-item-action">🏠 Dashboard</a>
                    <a href="{{ route('guru.asesmen.pilih') }}" class="list-group-item list-group-item-action">🧮 Nilai Asesmen</a>
                    <a href="{{ route('guru.asesmen.daftar') }}" class="list-group-item list-group-item-action">📁 Daftar Asesmen</a>
                @endif
            </div>
        </div>
    </div>
    @endauth

    {{-- Konten Utama --}}
    <main class="flex-grow-1 container mt-4">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="text-center text-muted mt-4 mb-3">
        <small>&copy; {{ date('Y') }} PPDB SLB-B Dharma Wanita Sidoarjo</small>
    </footer>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
