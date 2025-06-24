@extends('layouts.app')

@section('title', 'Tambah Guru')

@section('content')
<div class="container" style="max-width: 900px; margin: 30px auto;">

    <div class="mt-4">
        <a href="{{ route('admin.users') }}" class="btn btn-outline-dark mb-4">
            ⬅ Kembali ke Manajemen Pengguna
        </a>
    </div>

    <h2 class="mb-4 text-center">➕ Tambah Guru</h2>

    {{-- Form Tambah Guru --}}
    <form method="POST" action="{{ route('admin.users.add') }}" class="shadow-sm p-4 rounded bg-light">
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" id="nama" name="nama"
                   class="form-control @error('nama') is-invalid @enderror"
                   value="{{ old('nama') }}" required>
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email"
                   class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password"
                   class="form-control @error('password') is-invalid @enderror"
                   required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary w-100">Tambah Guru</button>
    </form>

</div>
@endsection
