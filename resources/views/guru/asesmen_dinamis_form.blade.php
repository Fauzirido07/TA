@extends('layouts.apps')

@section('title', 'Form Asesmen')

@section('content')
<div class="row">
    <div class="col-md-12">
    <div class="mb-3">
        <a href="{{ route('guru.asesmen_dinamis.pilih') }}" class="btn btn-outline-dark">⬅ Kembali ke Pilih Siswa</a>
    </div>

    <h2>🧩 Form Asesmen untuk: {{ $pendaftaran->nama_lengkap }}</h2>

    {{-- Penjelasan Skor --}}
    <div class="alert alert-info mt-3">
        <strong>ℹ️ Rentang Skor Asesmen (1–3):</strong><br>
        <strong>1</strong> — Tidak bisa<br>
        <strong>2</strong> — Bisa dengan bimbingan<br>
        <strong>3</strong> — Bisa mandiri
    </div>

    <form method="POST" action="{{ route('guru.asesmen_dinamis.store', $pendaftaran->id) }}">
        @csrf

        @foreach($headers as $header)
            <div class="card mt-4">
                <div class="card-header bg-primary text-white">
                    <strong>{{ $header->title }}</strong>
                </div>
                <div class="card-body">
                    @foreach($header->formAsesmen as $form)
                        <div class="mb-3">
                            <label><strong>{{ $form->question }}</strong></label>
                            @if($form->question_type == 1)
                                <input type="number" name="form_asesmen[{{ $form->id }}]" class="form-control" min="1" max="3" required>
                            @elseif($form->question_type == 2)
                                <textarea name="form_asesmen[{{ $form->id }}]" class="form-control" rows="2" required></textarea>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

        <button type="submit" class="btn btn-success mt-4">💾 Simpan Asesmen</button>
    </form>
    </div>
</div>
@endsection
