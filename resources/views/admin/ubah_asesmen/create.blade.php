@extends('layouts.apps')

@section('title', 'Tambah Form Asesmen Baru')

@section('content')
<div class="row">
    <div class="col-md-12">
    <div class="mb-4">
        <a href="{{ route('admin.ubah_asesmen.index') }}" class="btn btn-outline-dark">⬅ Kembali ke Ubah Form Asesmen</a>
    </div>

    <form method="POST" action="{{ route('admin.ubah_asesmen.store') }}">
        @csrf

        {{-- Header (Kategori Pertanyaan) --}}
        <div class="mb-3">
            <label for="header" class="form-label">Kategori / Header</label>
            <select name="form_asesmen_header_id" id="header" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($headers as $header)
                    <option value="{{ $header->id }}">{{ $header->title }}</option>
                @endforeach
            </select>
        </div>

        {{-- Pertanyaan --}}
        <div class="mb-3">
            <label for="question" class="form-label">Pertanyaan</label>
            <textarea name="question" id="question" rows="3" class="form-control" placeholder="Tulis pertanyaan asesmen..." required></textarea>
        </div>

        {{-- Jenis Input --}}
        <div class="mb-3">
            <label for="question_type" class="form-label">Tipe Input</label>
            <select name="question_type" id="question_type" class="form-select" required>
                <option value="">-- Pilih Jenis Input --</option>
                <option value="1">Number (1–5)</option>
                <option value="2">Text Area</option>
            </select>
        </div>

        <div>   
            {{-- Urutan Tampilan --}}
            <div class="mb-3">
                <label for="order" class="form-label">Urutan Tampilan</label>
                <input type="number" name="order" id="order" class="form-control" placeholder="Masukkan urutan tampilan (angka lebih kecil tampil lebih awal)" required>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">💾 Simpan Pertanyaan</button>
    </form>
</div>
</div>
@endsection
