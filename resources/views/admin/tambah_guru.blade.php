@extends('layouts.apps')

@section('title', 'Tambah Guru')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="mb-4">
        <a href="{{ route('admin.users') }}" class="btn btn-outline-dark">⬅ Kembali ke Manajemen Guru & Staff</a>
        </div>

        <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title">List</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                    <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                    <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
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

                    <button class="btn btn-primary">Tambah Guru</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
