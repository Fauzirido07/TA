@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">➕ Tambah Jadwal Asesmen</h2>

    <form method="POST" action="{{ route('admin.jadwal.store') }}">
        @csrf

        <div class="mb-3">
            <label>Pilih Pendaftar</label>
            <select name="pendaftaran_id" class="form-select" required>
                <option value="">-- Pilih Siswa --</option>
                @foreach($pendaftar as $p)
                    <option value="{{ $p->id }}">{{ $p->nama_lengkap }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Waktu</label>
            <input type="time" name="waktu" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Lokasi</label>
            <input type="text" name="lokasi" class="form-control" required>
        </div>

        <button class="btn btn-success">Simpan Jadwal</button>
        <a href="{{ route('admin.jadwal') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
