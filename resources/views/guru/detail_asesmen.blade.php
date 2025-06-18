@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mt-4">
        <a href="{{ route('guru.asesmen.daftar') }}" class="btn btn-outline-dark mb-4">⬅ Kembali ke Daftar Asesmen</a>
    </div>
    <h2 class="mb-4">🔍 Detail Asesmen</h2>

    <table class="table table-bordered">
        <tr>
            <th>Nama Pendaftar</th>
            <td>{{ $asesmen->pendaftaran->nama_lengkap ?? '-' }}</td>
        </tr>
        <tr>
            <th>Skor Total</th>
            <td>{{ $asesmen->skor }}</td>
        </tr>
        <tr>
            <th>Rekomendasi</th>
            <td>{{ $asesmen->rekomendasi }}</td>
        </tr>
    </table>

    <h4 class="mt-4">Jawaban Detail:</h4>

    <h5 class="mt-3">A. Gangguan Pendengaran</h5>
    <ul>
        @foreach($jawaban['pendengaran'] ?? [] as $i => $score)
            <li>Gejala {{ $i+1 }}: Skor {{ $score }}</li>
        @endforeach
    </ul>

    <h5 class="mt-3">B. Anak Berbakat</h5>
    <ul>
        @foreach($jawaban['berbakat'] ?? [] as $i => $score)
            <li>Gejala {{ $i+1 }}: Skor {{ $score }}</li>
        @endforeach
    </ul>

    <h5 class="mt-3">C. Kesulitan Belajar Spesifik</h5>
    <ul>
        @foreach($jawaban['kesulitan'] ?? [] as $i => $score)
            <li>Gejala {{ $i+1 }}: Skor {{ $score }}</li>
        @endforeach
    </ul>

</div>
@endsection
