@extends('layouts.apps')

@section('title', 'Detail Asesmen')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if($pendaftaran)
            @if($pendaftaran->status=='pending')
            <div class="alert alert-warning">
                <h5><i class="icon fas fa-info"></i> Informasi!</h5>
                Anda belum melakukan administrasi. Silahkan menyelesaikan administrasi pendaftaran diSLB-B kami secara langsung.
                <br>Terima Kasih.
            </div>
            @elseif($pendaftaran->status=='diproses' or $pendaftaran->status=='diterima' or $pendaftaran->status=='ditolak')
                @if($pendaftaran->daftarUlang)
                    @if($pendaftaran->asesmen)
                    @php

                        if ($persen <= 50) {
                            $huruf = 'D';
                        } elseif ($persen <= 65) {
                            $huruf = 'C';
                        } elseif ($persen <= 80) {
                            $huruf = 'B';
                        } else {
                            $huruf = 'A';
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
                    @else
                    <div class="alert alert-info">
                        <h5><i class="icon fas fa-info"></i> Informasi!</h5>
                        Hasil asesmen belum tersedia. Silahkan cek kembali nanti.
                        <br>Terima Kasih.
                    </div>
                    @endif
                @else
                <div class="alert alert-info">
                    <h5><i class="icon fas fa-info"></i> Informasi!</h5>
                    Silahkan Melakukan Daftar Ulang di Menu <b>Daftar Ulang</b> untuk menyelesaikan proses pendaftaran Anda.
                    <br>Terima Kasih.
                </div>
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
