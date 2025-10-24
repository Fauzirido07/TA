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
    </style>
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
