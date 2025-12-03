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
                Silahkan mengupload berkas administrasi dan daftar ulang di menu <b>Daftar Ulang</b> Jika sudah mengupload berkas, silahkan menunggu proses pemberian jadwal asesmen untuk segera diasesmen diSLB-B Dharma Wanita Secara Langsung.
                <br>Untuk melihat jadwal asesmen silahkan ke menu <b>Jadwal Asesmen</b>.
                <br>Jika sudah diasesmen silahkan ke menu <b>Hasil Asesmen</b> untuk melihat hasil asesmen. 
                <br>Terima Kasih.
            </div>
            @elseif($pendaftaran->status=='diterima')
            <div class="alert alert-success">
                <h5><i class="icon fas fa-info"></i> Informasi!</h5>
                Selamat Anda Sudah Diterima diSLB-B Dharma Wanita Sidoarjo </b> 
            </div>
            @elseif($pendaftaran->status=='ditolak')
            <div class="alert alert-danger">
                <h5><i class="icon fas fa-info"></i> Informasi!</h5>
                Mohon Maaf Anda Belum Diterima Di Sekolah Kami. Tetap Semangat dan Jangan Menyerah Mencari Sekolah yang Tepat!
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
    
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                @if($pendaftaran)
                    @if($pendaftaran->status == 'diterima' || $pendaftaran->status == 'ditolak')
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated"
                                role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                style="width: 100%">100%</div>
                        </div>
                        <br>
                        <div class="text-center">Pengumuman</div>
                    @elseif($pendaftaran->jadwalAsesmen)
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated"
                                role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                style="width: 75%">75%</div>
                        </div>
                        <br>
                        <div class="text-center">Proses Asesmen</div>
                    @elseif($pendaftaran->daftarUlang)
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated"
                                role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"
                                style="width: 50%">50%</div>
                        </div>
                        <br>
                        <div class="text-center">Proses Administrasi & Daftar Ulang</div>
                    @elseif(!$pendaftaran->daftarUlang)
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated"
                                role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"
                                style="width: 25%">25%</div>
                        </div>
                        <br>
                        <div class="text-center">Terdaftar</div>

                    @else
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 0%">0%</div>
                        </div>
                        <br>
                        <div class="text-center">Status Tidak Diketahui</div>
                    @endif
                @else
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                            role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                            style="width: 0%">0%</div>
                    </div>
                    <br>
                    <div class="text-center">Belum Mendaftar</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
