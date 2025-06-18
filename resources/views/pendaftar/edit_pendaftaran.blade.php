@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 750px; margin: 30px auto;">

    <div class="d-flex justify-content-start mb-3">
        <a href="{{ route('dashboard.pendaftar') }}" class="btn btn-outline-dark">⬅ Kembali ke Dashboard</a>
    </div>

    <h2 class="mb-4 text-center">📋 Edit Data Pendaftaran</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('warning'))
        <div class="alert alert-warning">{{ session('warning') }}</div>
    @endif

    <form method="POST" action="{{ route('pendaftaran.update') }}" enctype="multipart/form-data">
        @csrf

        {{-- A. Identitas Anak --}}
        @include('pendaftaran.partial_identitas', ['pendaftaran' => $pendaftaran])

        {{-- B. Riwayat Kelahiran --}}
        @include('pendaftaran.partial_kelahiran', ['pendaftaran' => $pendaftaran])

        {{-- C. Perkembangan Masa Balita --}}
        @include('pendaftaran.partial_balita', ['pendaftaran' => $pendaftaran])

        {{-- D. Perkembangan Fisik --}}
        @include('pendaftaran.partial_fisik', ['pendaftaran' => $pendaftaran])

        {{-- E. Perkembangan Bahasa --}}
        @include('pendaftaran.partial_bahasa', ['pendaftaran' => $pendaftaran])

        {{-- F. Perkembangan Sosial --}}
        @include('pendaftaran.partial_sosial', ['pendaftaran' => $pendaftaran])

        {{-- G. Perkembangan Pendidikan --}}
        @include('pendaftaran.partial_pendidikan', ['pendaftaran' => $pendaftaran])

        {{-- H. Data Orang Tua/Wali --}}
        @include('pendaftaran.partial_orangtua', ['pendaftaran' => $pendaftaran])

        {{-- Dokumen Pendukung --}}
        <fieldset class="border p-3 mb-4">
            <legend class="w-auto px-2">📄 Dokumen Pendukung</legend>

            @if($pendaftaran->dokumen_pendukung)
                <p>Dokumen Lama: 
                    <a href="{{ asset('storage/' . $pendaftaran->dokumen_pendukung) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                        📄 Lihat Dokumen
                    </a>
                </p>
            @endif

            <div class="mb-3">
                <label>Upload Dokumen Baru (opsional, jika ingin mengganti)</label>
                <input type="file" name="dokumen_pendukung" class="form-control">
                <small class="text-muted">Format PDF/JPG/PNG maksimal 2MB.</small>
            </div>
        </fieldset>

        <button type="submit" class="btn btn-success w-100">💾 Simpan Perubahan</button>
    </form>
</div>
@endsection
