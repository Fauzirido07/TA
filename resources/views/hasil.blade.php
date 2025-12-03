@extends('layouts.apps')

@section('title', 'Detail Asesmen')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if($pendaftaran)
            @if($pendaftaran->status=='pending')
            <div class="alert alert-warning">
                <h5><i class="icon fas fa-info"></i> Informasi!</h5>
                Anda belum melakukan administrasi. Silahkan menyelesaikan administrasi pendaftaran diSLB-B Dharma Wanita Sidoarjo secara langsung.
                <br>Terima Kasih.
            </div>
            @elseif($pendaftaran->status=='diproses' or $pendaftaran->status=='diterima' or $pendaftaran->status=='ditolak')
                @if($pendaftaran->daftarUlang)
                    @if($pendaftaran->asesmen)
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
                            <li class="list-group-item">

                                <strong>{{ $item->formAsesmen->question }}</strong>

                                @if($item->formAsesmen->question_type == 1)
                                    {{-- SKOR (numerik) --}}
                                    <span class="badge bg-primary rounded-pill float-end">
                                        Skor {{ $item->jawaban }}
                                    </span>

                                @elseif($item->formAsesmen->question_type == 2)
                                    {{-- TEKS --}}
                                    <div class="mt-2 p-2 bg-light border rounded">
                                        {{ $item->jawaban }}
                                                </div>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                        @endforeach
                    @else
                    <div class="alert alert-info">
                        <h5><i class="icon fas fa-info"></i> Informasi!</h5>
                        Hasil asesmen belum tersedia. Silahkan cek kembali nanti.
                        <br>Terima Kasih.
                    </div>
                    @endif
                @else
                @endif
            @endif
        @else
            <div class="alert alert-info">
                <h5><i class="icon fas fa-info"></i> Informasi!</h5>
                Anda belum mengisi formulir pendaftaran. Silahkan mendaftar melalui menu <b>Formulir Pendaftaran</b>
                <br>Terima Kasih.
            </div>
        @endif
    </div>
</div>
@endsection
