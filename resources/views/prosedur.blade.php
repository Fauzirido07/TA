@extends('layouts.apps')
@section('title', 'Prosedur Pendaftaran')
@section('content')

<div class="row">
    <div class="col-md-12">
    <p class="mb-3">Silakan ikuti langkah-langkah berikut untuk melakukan pendaftaran di SLB-B Dharma Wanita Sidoarjo:</p>
    <p class="mb-3">1. Buat akun terlebih dahulu dengan menekan tombol <b>Daftar</b> lalu mengisi nama, email google dan password</p>
    <p class="mb-3">2. Setelah membuat akun, dapat dilanjut dengan melakukan <b>Login</b> menggunkan akun yang sudah dibuat sebelumnya</p>
    <p class="mb-3">3. Setelah berhasil login, pengguna dapat mendaftar dengan cara memilih tombol <b>Formulir Pendaftaran</b> dan mengisi form</p>
    <p class="mb-3">4. Kemudian jika sudah melengkapi <b>Formulir Pendaftaran</b>, pengguna dapat mengirim form tersebut lalu melanjutkan keproses administrasi langsung ke SLB-B Dharma Wanita Sidoarjo</p>
    <p class="mb-3">5. Jika sudah melakukan administrasi maka pengguna dapat melakukan daftar ulang dengan menekan tombol <b>Daftar Ulang</b> dan mengupload berkas-berkas atau dokumen daftar ulang dengan cara menekan tombol <b>Upload Berkas Daftar Ulang</b> dan akan mendapatkan jadwal untuk asesmen secara langsung diSLB-B Dharma Wanita Sidoarjo</p>
    <p class="mb-3">6. Jika sudah melakukan asesmen, pengguna dapat melihat hasil asesmen dengan menekan tombol <b>Lihat Hasil Asesmen</b>, pengguna juga dapat mendownload hasil asesmen dengan cara menekan tombol <b>cetak hasil asesmen</b></p>
    <p class="mb-3">7. Selesai, pengguna telah berhasil melakukan pendaftaran di SLB-B Dharma Wanita Sidoarjo</p>
    <p class="mb-4">Untuk melihat prosedur pendaftaran secara lengkap, silakan klik tombol di bawah ini:</p>

    @if(!$prosedur)
        <div class="alert alert-warning text-center shadow-sm">
            <i class="bi bi-exclamation-circle-fill"></i> Belum ada prosedur yang ditambahkan.
        </div>
    @else
        <a href="{{ asset($prosedur->file_path) }}" class="btn btn-primary" target="_blank">
            📄 Lihat {{$prosedur->deskripsi}}
        </a>
    @endif
    </div>
</div>

@endsection
