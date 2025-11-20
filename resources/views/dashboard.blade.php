@extends('layouts.apps')

@section('title', 'Dashboard')

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
            @elseif($pendaftaran->status=='diproses')
            <div class="alert alert-primary">
                <h5><i class="icon fas fa-info"></i> Informasi!</h5>
                Anda sudah mengisi formulir pendaftaran. Silahkan melihat dimenu <b>Lihat Pendaftaran Saya</b> sembari menunggu proses verifikasi dari pihak sekolah.
                <br>Terima Kasih.
            </div>
            @elseif($pendaftaran->status=='diterima')
            <div class="alert alert-success">
                <h5><i class="icon fas fa-info"></i> Informasi!</h5>
                Selamat Anda Sudah Diterima. Untuk Info lebih Lanjut Silahkan Cek Menu <b>Hasil Asesmen</b> dan Melakukan Daftar Ulang diMenu <b>Daftar Ulang</b>
                <br>Terima Kasih.
            </div>
            @elseif($pendaftaran->status=='ditolak')
            <div class="alert alert-danger">
                <h5><i class="icon fas fa-info"></i> Informasi!</h5>
                Mohon Maaf Anda Belum Diterima Di Sekolah Kami. Tetap Semangat dan Jangan Menyerah Mencari Sekolah yang Tepat!
                <br>Terima Kasih.
            </div>
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
