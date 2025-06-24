@extends('layouts.app')

@section('title', 'Detail Asesmen')

@section('content')
<div class="container" style="max-width: 900px; margin: 30px auto;">

    <div class="mt-4">
        <a href="{{ route('guru.asesmen.daftar') }}" class="btn btn-outline-dark mb-4">
            ⬅ Kembali ke Daftar Asesmen
        </a>
    </div>

    <h2 class="mb-4 text-center">🔍 Detail Asesmen</h2>

    @php
        $maxPerGejala = 5;
        $totalSkor = $asesmen->skor ?? 0;

        // Hitung jumlah gejala total dari jawaban
        $totalGejala = 0;
        foreach ($jawaban as $kategoriJawaban) {
            $totalGejala += count($kategoriJawaban);
        }

        $maxSkor = $totalGejala * $maxPerGejala;
        $persen = $maxSkor > 0 ? round(($totalSkor / $maxSkor) * 100) : 0;

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
        </table>
    </div>

    <h4 class="mt-4">📌 Jawaban Detail</h4>

    @php
        $kategori = [
            'A. Gangguan Penglihatan' => 'gangguan_penglihatan',
            'B. Gangguan Pendengaran' => 'gangguan_pendengaran',
            'C. Tunagrahita' => 'tunagrahita',
            'D. Tunadaksa (Kelainan Gerak Tubuh)' => 'tunadaksa',
            'E. Tunalaras (Emosi dan Perilaku)' => 'tunalaras',
            'F. Anak Berbakat' => 'berbakat',
            'G. Anak Lamban Belajar' => 'lamban_belajar',
            'H. Anak Kesulitan Belajar Spesifik' => 'kesulitan_belajar',
        ];
    @endphp

    @foreach($kategori as $judul => $key)
        <h5 class="mt-3">{{ $judul }}</h5>
        @if(!empty($jawaban[$key]))
            <ul class="list-group mb-3 shadow-sm">
                @foreach($jawaban[$key] as $i => $score)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Gejala {{ $i + 1 }}
                        <span class="badge bg-primary rounded-pill">Skor {{ $score }}</span>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="text-muted fst-italic">Tidak ada data.</div>
        @endif
    @endforeach

</div>
@endsection
