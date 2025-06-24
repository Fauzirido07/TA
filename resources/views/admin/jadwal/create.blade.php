@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 750px; margin: 30px auto;">

    <div class="mt-4">
        <a href="{{ route('admin.jadwal') }}" class="btn btn-outline-dark mb-4">⬅ Kembali ke Jadwal</a>
    </div>

    <h2 class="mb-4 text-center">🗓 Tambah Jadwal Asesmen</h2>

    {{-- Tampilkan error global --}}
    @if ($errors->any())
        <div class="alert alert-danger shadow-sm">
            <h6 class="mb-2">Mohon perbaiki kesalahan berikut:</h6>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.jadwal.store') }}">
        @csrf

        <fieldset class="border p-3 mb-4">
            <legend class="w-auto px-2">📌 Data Jadwal</legend>

            <div class="mb-3">
                <label for="pendaftaran_id">Pilih Pendaftar</label>
                <select name="pendaftaran_id" id="pendaftaran_id"
                        class="form-select @error('pendaftaran_id') is-invalid @enderror" required>
                    <option value="">-- Pilih Siswa --</option>
                    @foreach($pendaftar as $p)
                        <option value="{{ $p->id }}" {{ old('pendaftaran_id') == $p->id ? 'selected' : '' }}>
                            {{ $p->nama_lengkap }}
                        </option>
                    @endforeach
                </select>
                @error('pendaftaran_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal"
                           class="form-control @error('tanggal') is-invalid @enderror"
                           value="{{ old('tanggal') }}" required>
                    @error('tanggal')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="waktu">Waktu</label>
                    <input type="time" name="waktu" id="waktu"
                           class="form-control @error('waktu') is-invalid @enderror"
                           value="{{ old('waktu') }}" required>
                    @error('waktu')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="lokasi">Lokasi</label>
                <input type="text" name="lokasi" id="lokasi"
                       class="form-control @error('lokasi') is-invalid @enderror"
                       value="{{ old('lokasi') }}" required>
                @error('lokasi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

        </fieldset>

        <button type="submit" class="btn btn-success w-100">💾 Simpan Jadwal</button>
    </form>

</div>
@endsection
