@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 750px; margin: 30px auto;">

    <div class="mt-4">
        <a href="{{ route('admin.jadwal') }}" class="btn btn-outline-dark mb-4">⬅ Kembali ke Manajemen Jadwal</a>
    </div>

    <h2 class="mb-4 text-center fw-bold">✏️ Edit Jadwal Asesmen</h2>

    {{-- Tampilkan error jika ada --}}
    @if ($errors->any())
        <div class="alert alert-danger shadow-sm">
            <h6>Mohon perbaiki kesalahan berikut:</h6>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.jadwal.update', $jadwal->id) }}">
        @csrf

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal"
                   class="form-control @error('tanggal') is-invalid @enderror"
                   value="{{ old('tanggal', $jadwal->tanggal) }}" required>
            @error('tanggal')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="waktu" class="form-label">Waktu</label>
            <input type="time" name="waktu" id="waktu"
                   class="form-control @error('waktu') is-invalid @enderror"
                   value="{{ old('waktu', $jadwal->waktu) }}" required>
            @error('waktu')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" name="lokasi" id="lokasi"
                   class="form-control @error('lokasi') is-invalid @enderror"
                   value="{{ old('lokasi', $jadwal->lokasi) }}" required>
            @error('lokasi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-success">💾 Simpan Perubahan</button>
            <a href="{{ route('admin.jadwal') }}" class="btn btn-secondary">❌ Batal</a>
        </div>
    </form>
</div>
@endsection
