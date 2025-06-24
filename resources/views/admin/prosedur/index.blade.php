@extends('layouts.app')

@section('title', 'Manajemen Prosedur Pendaftaran')

@section('content')
<div class="container" style="max-width: 900px; margin: 30px auto;">

    <div class="mt-4">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark mb-4">
            ⬅ Kembali ke Dashboard
        </a>
    </div>

    <h2 class="mb-4 text-center">📌 Manajemen Prosedur Pendaftaran</h2>


    {{-- Form tambah prosedur --}}
    <form method="POST" action="{{ route('admin.prosedur.store') }}" class="mb-4 shadow-sm p-3 rounded bg-light">
        @csrf
        <div class="input-group">
            <input type="text" name="deskripsi"
                   class="form-control @error('deskripsi') is-invalid @enderror"
                   placeholder="Tulis prosedur baru..." required>
            <button class="btn btn-primary">Tambah</button>
        </div>
        @error('deskripsi')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
        @enderror
    </form>

    {{-- Daftar prosedur --}}
    <ul class="list-group shadow-sm">
        @forelse($prosedur as $item)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>{{ $item->deskripsi }}</span>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.prosedur.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.prosedur.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus prosedur ini?')">
                        @csrf
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </div>
            </li>
        @empty
            <li class="list-group-item text-muted text-center">Belum ada prosedur pendaftaran.</li>
        @endforelse
    </ul>

</div>
@endsection
