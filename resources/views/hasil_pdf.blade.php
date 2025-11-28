<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PDF Hasil Asesmen</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        h2 { text-align: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 5px; }
        th { background-color: #ddd; }
        .bordered th, .bordered td {
            border: 1px solid #333;
        }
        .center {
            text-align: center;
        }
        .kop-title {
            font-size: 18px;
            font-weight: bold;
        }
        .kop-sub {
            font-size: 14px;
        }
        .garis-tebal {
            border-bottom: 3px solid #000;
            margin-top: 4px;
            margin-bottom: 15px;
        }
        .foto {
            width: 110px;
            height: 140px;
            object-fit: cover;
            border: 1px solid #333;
        }
    </style>
</head>
<body>

{{-- KOP SEKOLAH --}}
<table>
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
            <div class="kop-sub">Jl. Pahlawan GG. Pahlawan, Sidokumpul, Kec. Sidoarjo Kabupaten Sidoarjo</div>
            <div class="kop-sub">Telp: 085731271050 | Email: slbdwsda@onklas.id</div>
        </td>
    </tr>
</table>
<div class="garis-tebal"></div>
</head>
<body>
    <h2>Laporan Hasil Asesmen</h2>
    
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
                <td>{{ $asesmen->rekomendasi }}</td>
            </tr>
        </table>
            
        @foreach($hasilAsesmen as $key => $hasil)
        <h3 class="mt-3">{{ $hasil->first()->header_title }}</h3>
        <table>
            @foreach($hasil as $item)
            @if($item->question_type == 1)
            <tr>
                <td style="width: 80%;">{{ $item->formAsesmen->question }}</td>
                <td>Skor {{ $item->jawaban }}</td>
            </tr>
            @else
              <tr>
                <td>
                    {{ $item->jawaban }}
                </td>
            </tr>
            @endif
            @endforeach
        </table>    
        @endforeach

</body>
</html>
