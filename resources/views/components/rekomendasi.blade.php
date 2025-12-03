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
