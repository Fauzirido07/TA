@extends('layouts.apps')

@section('title', 'Edit Form Asesmen')

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

    <form method="POST" action="{{ route('admin.ubah_asesmen.update', $form->id) }}">
        @csrf

        {{-- Header / Kategori --}}
        <div class="mb-3">
            <label for="header" class="form-label">Kategori / Header</label>
            <select name="form_asesmen_header_id" id="header" class="form-select" required>
                @foreach($headers as $header)
                    <option value="{{ $header->id }}" {{ $form->form_asesmen_header_id == $header->id ? 'selected' : '' }}>
                        {{ $header->title }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Pertanyaan --}}
        <div class="mb-3">
            <label for="question" class="form-label">Pertanyaan</label>
            <textarea name="question" id="question" rows="3" class="form-control" required>{{ old('question', $form->question) }}</textarea>
        </div>

        {{-- Jenis Input --}}
        <div class="mb-3">
            <label for="question_type" class="form-label">Tipe Input</label>
            <select name="question_type" id="question_type" class="form-select" required>
                <option value="1" {{ $form->question_type == 1 ? 'selected' : '' }}>Number (1–5)</option>
                <option value="2" {{ $form->question_type == 2 ? 'selected' : '' }}>Text Area</option>
            </select>
        </div>

        <div>   
            {{-- Urutan Tampilan --}}
            <div class="mb-3">
                <label for="order" class="form-label">Urutan Tampilan</label>
                <input type="number" name="order" id="order" class="form-control" value="{{ old('order', $form->order) }}" required>
            </div>

        <button type="submit" class="btn btn-warning">💾 Update Pertanyaan</button>
    </form>
    </div>
</div>
@endsection
