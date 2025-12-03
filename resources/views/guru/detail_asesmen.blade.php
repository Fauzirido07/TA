@extends('layouts.apps')

@section('title', 'Hasil Evaluasi Asesmen')

@section('content')
<div class="row">
    <div class="col-md-12">

    <div class="mt-4">
        <a href="{{ route('guru.asesmen.daftar') }}" class="btn btn-outline-dark mb-4">
            ⬅ Kembali ke Daftar Asesmen
        </a>
    </div>


    @php

        if ($persen <= 50) {
            $huruf = 'D (Perlu Bimbingan)';
            $rekomendasi = 'Turun 2 tingkat.';
        } elseif ($persen <= 65) {
            $huruf = 'C (Cukup)';
            $rekomendasi = 'Turun 1 tingkat.';
        } elseif ($persen <= 80) {
            $huruf = 'B (Baik)';
            $rekomendasi = 'Tetap di tingkat saat ini.';
        } else {
            $huruf = 'A (Sangat Baik)';
            $rekomendasi = 'Tetap di tingkat saat ini.';   
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
                <td>{{ $rekomendasi }}</td>
            </tr>
        </table>
    </div>

    <h4 class="mt-4">📌 Jawaban Detail</h4>

        @foreach($hasilAsesmen as $key => $hasil)
        <h5 class="mt-3">{{ $hasil->first()->header_title }}</h5>
        <ul class="list-group mb-3 shadow-sm">
            @foreach($hasil->sortBy('order') as $item)
                <li class="list-group-item">
                    <strong>{{ $item->formAsesmen->question }}</strong>

                    @if($item->formAsesmen->question_type == 1)
                        <span class="badge bg-primary rounded-pill float-end">
                            Skor {{ $item->jawaban }}
                        </span>

                    @elseif($item->formAsesmen->question_type == 2)
                        <div class="mt-2 p-2 bg-light rounded border">
                            {{ $item->jawaban }}
                        </div>
                    @endif
                </li>
            @endforeach
        </ul>
    @endforeach

    </div>
</div>
@endsection
