@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 750px; margin: 30px auto;">

    <div class="mt-4">
        <a href="{{ route('dashboard.pendaftar') }}" class="btn btn-outline-dark mb-4">⬅ Kembali ke Dashboard</a>
    </div>

    <h2 class="mb-4 text-center">📄 Formulir Pendaftaran Masuk</h2>

    {{-- Global Error Display --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <h6>Mohon perbaiki kesalahan berikut:</h6>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('daftar.post') }}" enctype="multipart/form-data">
        @csrf

        {{-- A. IDENTITAS ANAK --}}
        <fieldset class="border p-3 mb-4">
            <legend class="w-auto px-2">A. Identitas Anak</legend>

            <div class="mb-3">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" id="nama_lengkap"
                       class="form-control @error('nama_lengkap') is-invalid @enderror"
                       value="{{ old('nama_lengkap') }}" required>
                @error('nama_lengkap')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir"
                           class="form-control @error('tempat_lahir') is-invalid @enderror"
                           value="{{ old('tempat_lahir') }}" required>
                    @error('tempat_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                           class="form-control @error('tanggal_lahir') is-invalid @enderror"
                           value="{{ old('tanggal_lahir') }}" required>
                    @error('tanggal_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin"
                            class="form-control @error('jenis_kelamin') is-invalid @enderror" required>
                        <option value="">-- Pilih --</option>
                        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="agama">Agama</label>
                    <input type="text" name="agama" id="agama"
                           class="form-control @error('agama') is-invalid @enderror"
                           value="{{ old('agama') }}" required>
                    @error('agama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="anak_ke">Anak ke-</label>
                    <input type="number" name="anak_ke" id="anak_ke"
                           class="form-control @error('anak_ke') is-invalid @enderror"
                           value="{{ old('anak_ke') }}" min="1" required>
                    @error('anak_ke')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="jumlah_saudara">Jumlah Saudara</label>
                    <input type="number" name="jumlah_saudara" id="jumlah_saudara"
                           class="form-control @error('jumlah_saudara') is-invalid @enderror"
                           value="{{ old('jumlah_saudara') }}" min="1" required>
                    @error('jumlah_saudara')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat"
                          class="form-control @error('alamat') is-invalid @enderror"
                          rows="2" required>{{ old('alamat') }}</textarea>
                @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </fieldset>

        {{-- B. RIWAYAT KELAHIRAN --}}
        <fieldset class="border p-3 mb-4">
            <legend class="w-auto px-2">B. Riwayat Kelahiran</legend>

            @foreach ([
                'perkembangan_kehamilan' => 'Perkembangan Masa Kehamilan',
                'penyakit_kehamilan' => 'Penyakit Selama Kehamilan',
                'usia_kandungan' => 'Usia Kandungan Saat Lahir',
                'proses_kelahiran' => 'Riwayat Proses Kelahiran',
                'tempat_kelahiran' => 'Tempat Kelahiran',
                'penolong_kelahiran' => 'Penolong Proses Kelahiran',
                'gangguan_lahir' => 'Gangguan Saat Lahir',
                'berat_bayi' => 'Berat Bayi (gram)',
                'panjang_bayi' => 'Panjang Bayi (cm)',
                'tanda_kelainan' => 'Tanda-tanda Kelainan'
            ] as $name => $label)
                <div class="mb-3">
                    <label for="{{ $name }}">{{ $label }}</label>
                    <input type="{{ in_array($name, ['berat_bayi', 'panjang_bayi']) ? 'number' : 'text' }}"
                           name="{{ $name }}" id="{{ $name }}"
                           class="form-control @error($name) is-invalid @enderror"
                           value="{{ old($name) }}" required>
                    @error($name)
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            @endforeach
        </fieldset>

        {{-- Partial includes tetap seperti biasa --}}
        {{-- Anda perlu menambahkan penanganan error dan old() di dalam file partial ini juga! --}}
        @include('pendaftaran.partial_balita')
        @include('pendaftaran.partial_fisik')
        @include('pendaftaran.partial_bahasa')
        @include('pendaftaran.partial_sosial')
        @include('pendaftaran.partial_pendidikan')
        @include('pendaftaran.partial_orangtua')

        {{-- Upload Dokumen --}}
        <fieldset class="border p-3 mb-4">
            <legend class="w-auto px-2">Upload Dokumen Pendukung</legend>
            <div class="mb-3">
                <label for="dokumen_pendukung">Upload Dokumen (PDF/JPG/PNG)</label>
                <input type="file" name="dokumen_pendukung" id="dokumen_pendukung"
                       class="form-control @error('dokumen_pendukung') is-invalid @enderror"
                       accept=".pdf,.jpg,.jpeg,.png" required>
                @error('dokumen_pendukung')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                {{-- Catatan: old('dokumen_pendukung') tidak berfungsi untuk input file. --}}
                {{-- Jika ada error file, pengguna harus memilih file lagi. --}}
            </div>
        </fieldset>

        <button type="submit" class="btn btn-success w-100">Kirim Pendaftaran</button>
    </form>
</div>
@endsection
