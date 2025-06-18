@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">✏️ Edit Jadwal Asesmen</h2>

    <form method="POST" action="{{ route('admin.jadwal.update', $jadwal->id) }}">
        @csrf
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $jadwal->tanggal }}" required>
        </div>

        <div class="mb-3">
            <label>Waktu</label>
            <input type="time" name="waktu" class="form-control" value="{{ $jadwal->waktu }}" required>
        </div>

        <div class="mb-3">
            <label>Lokasi</label>
            <input type="text" name="lokasi" class="form-control" value="{{ $jadwal->lokasi }}" required>
        </div>

        <button class="btn btn-success">Simpan Perubahan</button>
        <a href="{{ route('admin.jadwal') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
