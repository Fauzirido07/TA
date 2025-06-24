@extends('layouts.app')

@section('title', 'Manajemen Guru & Staff')

@section('content')
<div class="container" style="max-width: 900px; margin: 30px auto;">

    <div class="mt-4 d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark">
            ⬅ Kembali ke Dashboard
        </a>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
            ➕ Tambah Guru
        </a>
    </div>

    <h2 class="mb-4 text-center">👥 Manajemen Guru & Staff</h2>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="alert alert-success text-center shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- Notifikasi error --}}
    @if(session('error'))
        <div class="alert alert-danger text-center shadow-sm">
            {{ session('error') }}
        </div>
    @endif

    @if($users->isEmpty())
        <div class="alert alert-warning text-center shadow-sm">
            <i class="bi bi-exclamation-circle-fill"></i> Belum ada pengguna guru atau staff.
        </div>
    @else
        <div class="table-responsive shadow-sm">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light text-center">
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Peran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="text-center">{{ ucfirst($user->role) }}</td>
                        <td>
                            <div class="d-flex flex-wrap gap-2 justify-content-center">
                                {{-- Ubah Peran --}}
                                <form action="{{ route('admin.updateRole') }}" method="POST" class="d-flex align-items-center">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <select name="role" class="form-select form-select-sm me-2">
                                        <option value="guru" {{ $user->role === 'guru' ? 'selected' : '' }}>Guru</option>
                                        <option value="staff" {{ $user->role === 'staff' ? 'selected' : '' }}>Staff</option>
                                    </select>
                                    <button class="btn btn-sm btn-success">Simpan</button>
                                </form>

                                {{-- Hapus User --}}
                                <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" 
                                      onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')">
                                    @csrf
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

</div>
@endsection
