@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-4">
        <a href="{{ route('admin.users') }}" class="btn btn-outline-dark">⬅ Kembali ke Manajemen Pengguna</a>
    </div>

    <h2 class="mb-4">➕ Tambah Guru</h2>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {{-- Form Tambah Guru --}}
    <form method="POST" action="{{ route('admin.users.add') }}">
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>

        <button class="btn btn-primary">Tambah Guru</button>
    </form>
</div>
@endsection
