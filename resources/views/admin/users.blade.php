@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-4">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark">⬅ Kembali ke Dashboard</a>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary float-end">➕ Tambah Guru</a>
    </div>

    <h2 class="mb-4">👥 Manajemen Guru & Staff</h2>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    {{-- Notifikasi error --}}
    @if(session('error'))
        <div class="alert alert-danger text-center">
            {{ session('error') }}
        </div>
    @endif

    {{-- Tabel Daftar Pengguna --}}
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Peran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr>
                <td>{{ $user->nama }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ ucfirst($user->role) }}</td>
                <td>
                    {{-- Ubah Peran --}}
                    <form action="{{ route('admin.updateRole') }}" method="POST" class="d-flex align-items-center mb-1">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <select name="role" class="form-select me-2">
                            <option value="guru" {{ $user->role === 'guru' ? 'selected' : '' }}>Guru</option>
                            <option value="staff" {{ $user->role === 'staff' ? 'selected' : '' }}>Staff</option>
                        </select>
                        <button class="btn btn-sm btn-success">Simpan</button>
                    </form>

                    {{-- Hapus User --}}
                    <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" class="mt-1" onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')">
                        @csrf
                        <button class="btn btn-sm btn-danger w-100">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center text-muted">Belum ada pengguna guru atau staff.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
