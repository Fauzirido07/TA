<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PDF Hasil Asesmen</title>
    <style>
        body { 
            font-family: DejaVu Sans, sans-serif; 
            font-size: 12px;
            margin: 20px;
        }
        h2 { 
            text-align: center; 
            margin-bottom: 15px; 
        }
        h3 {
            margin-top: 20px;
            margin-bottom: 10px;
            font-size: 14px;
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 5px; 
        }
        th, td { 
            border: 1px solid #000; 
            padding: 6px; 
            vertical-align: top;
        }
        th {
            background-color: #efefef;
        }
        .center {
            text-align: center;
        }
        .kop-title {
            font-size: 18px;
            font-weight: bold;
        }
        .kop-sub {
            font-size: 13px;
        }
        .garis-tebal {
            border-bottom: 3px solid #000;
            margin-top: 3px;
            margin-bottom: 15px;
        }
        .no-border td, .no-border th {
            border: none !important;
        }
    </style>
</head>

<body>

{{-- KOP SEKOLAH --}}
<table class="no-border">
    <tr>
        <td width="15%" class="center">
            <img
                src="{{ public_path('assets/images/logo.png') }}"
                alt="Logo"
                style="width: 90px;"
            />
        </td>
        <td class="center">
            <div class="kop-title">SEKOLAH LUAR BIASA (SLB-B)</div>
            <div class="kop-title">DHARMA WANITA SIDOARJO</div>
            <div class="kop-sub">Jl. Pahlawan GG. Pahlawan, Sidokumpul, Kec. Sidoarjo</div>
            <div class="kop-sub">Telp: 085731271050 | Email: slbdwsda@onklas.id</div>
        </td>
    </tr>
</table>

<div class="garis-tebal"></div>

<h2>Laporan Hasil Asesmen</h2>

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

{{-- DATA UTAMA --}}
<table>
    <tr>
        <th style="width: 30%;">Nama Pendaftar</th>
        <td>{{ $asesmen->pendaftaran->nama_lengkap ?? '-' }}</td>
    </tr>
    <tr>
        <th>Skor Total</th>
        <td>
            {{ $totalSkor }} / {{ $maxSkor }} 
            <br>
            <small>
                Persentase: <strong>{{ $persen }}%</strong> 
                | Nilai: <strong>{{ $huruf }}</strong>
            </small>
        </td>
    </tr>
    <tr>
        <th>Rekomendasi</th>
        <td>{{ $rekomendasi }}</td>
    </tr>
</table>

{{-- HASIL PER BAGIAN --}}
@foreach ($hasilAsesmen as $hasil)
    <h3>{{ $hasil->first()->header_title }}</h3>

    <table>
        <thead>
            <tr>
                <th style="width: 85%;">Pertanyaan</th>
                <th style="width: 15%;">Skor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hasil as $item)
                @if ($item->formAsesmen->question_type == 1)
                    <tr>
                        <td style="width: 85%;">{{ $item->formAsesmen->question }}</td>
                        <td style="width: 15%; text-align: center">{{ $item->jawaban }}</td>
                    </tr>
                @elseif ($item->formAsesmen->question_type == 2)
                    <tr>
                        <td colspan="2">{{ $item->jawaban }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
@endforeach

</body>
</html>
