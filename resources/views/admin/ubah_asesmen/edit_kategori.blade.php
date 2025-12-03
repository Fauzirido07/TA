@extends('layouts.apps')

@section('title', 'Edit Kategori Asesmen')

@section('content')
<div class="row">
    <div class="col-md-12">
    <div class="mb-4">
        <a href="{{ route('admin.ubah_asesmen.index') }}" class="btn btn-outline-dark">⬅ Kembali ke Ubah Form Asesmen</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.ubah_asesmen.update_kategori', $header->id) }}">
        @csrf

        {{-- Kategori --}}
        <div class="mb-3">
            <label for="title" class="form-label">Kategori</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $header->title) }}" required>
        </div>

        <div>   
            {{-- Urutan Tampilan --}}
            <div class="mb-3">
                <label for="order" class="form-label">Urutan Tampilan</label>
                <input type="number" name="order" id="order" class="form-control" value="{{ old('order', $header->order) }}" required>
            </div>

        <button type="submit" class="btn btn-warning">💾 Update Kategori</button>
    </form>
    </div>
</div>
@endsection
