@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mt-4">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark mb-4 ">⬅ Kembali ke Dashboard</a>
    </div>

    <h2 class="mb-4">📌 Manajemen Prosedur Pendaftaran</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.prosedur.store') }}" class="mb-4">
        @csrf
        <div class="input-group">
            <input type="text" name="deskripsi" class="form-control" placeholder="Tulis prosedur baru..." required>
            <button class="btn btn-primary">Tambah</button>
        </div>
    </form>

    <ul class="list-group">
        @forelse($prosedur as $item)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $item->deskripsi }}
                <div class="btn-group">
                    <a href="{{ route('admin.prosedur.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.prosedur.destroy', $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus prosedur ini?')">Hapus</button>
                    </form>
                </div>
            </li>
        @empty
            <li class="list-group-item text-muted">Belum ada prosedur pendaftaran.</li>
        @endforelse
    </ul>

</div>
@endsection
