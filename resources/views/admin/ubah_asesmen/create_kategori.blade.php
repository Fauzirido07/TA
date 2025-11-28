@extends('layouts.apps')

@section('title', 'Tambah Kategori Asesmen Baru')

@section('content')
<div class="row">
    <div class="col-md-12">
    <div class="mb-4">
        <a href="{{ route('admin.ubah_asesmen.index') }}" class="btn btn-outline-dark">⬅ Kembali ke Ubah Form Asesmen</a>
    </div>

    <form method="POST" action="{{ route('admin.ubah_asesmen.store_kategori') }}">
        @csrf

        {{-- Pertanyaan --}}
        <div class="mb-3">
            <label for="question" class="form-label">Kategori</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Tulis kategori asesmen..." required>
        </div>

        <div>   
            {{-- Urutan Tampilan --}}
            <div class="mb-3">
                <label for="order" class="form-label">Urutan Tampilan</label>
                <input type="number" name="order" id="order" class="form-control" placeholder="Masukkan urutan tampilan (angka lebih kecil tampil lebih awal)" required>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">💾 Simpan Kategori</button>
    </form>
    </div>
</div>
@endsection
