@extends('layouts.app')

@section('content')

<div class="container">
    
    <div class="mt-4">
    <a href="{{ route('dashboard.pendaftar') }}" class="btn btn-outline-dark mb-4 ">⬅ Kembali ke Dashboard</a>
    </div>    
    
    <h2>Hasil Asesmen Anda</h2>

    @if($asesmen)
        <table class="table mt-4">
            <tr><th>Skor</th><td>{{ $asesmen->skor }}</td></tr>
            <tr><th>Rekomendasi</th><td>{{ $asesmen->rekomendasi }}</td></tr>
            <tr><th>Detail Jawaban</th><td>{{ $asesmen->hasil_asesmen }}</td></tr>
        </table>

        <div class="mt-3">
            <a href="{{ route('hasil.pdf') }}" class="btn btn-outline-primary">📄 Unduh PDF</a>
            <a href="{{ route('dashboard.pendaftar') }}" class="btn btn-secondary">⬅ Kembali ke Dashboard</a>
        </div>
    @else
        <div class="alert alert-info mt-3">Hasil asesmen Anda belum tersedia.</div>
    @endif
</div>
@endsection
