@extends('layouts.apps')

@section('title', 'Detail Asesmen')

@section('content')
<div class="container" style="max-width: 900px; margin: 30px auto;">

    @php

        if ($persen <= 50) {
            $huruf = 'D (Perlu Bimbingan)';
        } elseif ($persen <= 65) {
            $huruf = 'C (Cukup)';
        } elseif ($persen <= 80) {
            $huruf = 'B (Baik)';
        } else {
            $huruf = 'A (Sangat Baik)';
        }
    @endphp

    <div class="table-responsive shadow-sm">
        <table class="table table-bordered align-middle">
            <tr>
                <th class="table-light" style="width: 30%;">Nama Pendaftar</th>
                <td>{{ $asesmen->pendaftaran->nama_lengkap ?? '-' }}</td>
            </tr>
            <tr>
                <th class="table-light">Skor Total</th>
                <td>
                    {{ $totalSkor }} / {{ $maxSkor }} 
                    <br>
                    <small class="text-muted">
                        Persentase: <strong>{{ $persen }}%</strong> 
                        | Nilai: <strong>{{ $huruf }}</strong>
                    </small>
                </td>
            </tr>
            <tr>
                <th class="table-light">Rekomendasi</th>
                <td>{{ $asesmen->rekomendasi }}</td>
            </tr>
            <tr>
                <th class="table-light"></th>
                <td>
                    <a href="{{ route('hasil.pdf', $asesmen->id) }}" class="btn btn-success pull-right">
                        🖨️ Cetak Hasil Asesmen
                    </a>
                </td>
            </tr>
        </table>
    </div>

    <h4 class="mt-4">📌 Jawaban Detail</h4>

    @foreach($hasilAsesmen as $key => $hasil)
        <h5 class="mt-3">{{ $hasil->first()->header_title }}</h5>
            <ul class="list-group mb-3 shadow-sm">
                @foreach($hasil as $item)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                       {{ $item->formAsesmen->question }}
                        <span class="badge bg-primary rounded-pill">Skor {{ $item->jawaban }}</span>
                    </li>
                @endforeach
            </ul>
    @endforeach

</div>
@endsection
