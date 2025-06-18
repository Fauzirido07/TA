@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 750px; margin: 30px auto;">

    <div class="mt-4">
        <a href="{{ route('dashboard.pendaftar') }}" class="btn btn-outline-dark mb-4">⬅ Kembali ke Dashboard</a>
    </div>

    <h2 class="mb-4 text-center">📋 Data Pendaftaran Saya</h2>

    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>Nama Lengkap</th>
                <td>{{ $pendaftaran->nama_lengkap }}</td>
            </tr>
            <tr>
                <th>Tempat, Tanggal Lahir</th>
                <td>{{ $pendaftaran->tempat_lahir }}, {{ \Carbon\Carbon::parse($pendaftaran->tanggal_lahir)->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $pendaftaran->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $pendaftaran->alamat }}</td>
            </tr>
            <tr>
                <th>Anak ke-</th>
                <td>{{ $pendaftaran->anak_ke }} dari {{ $pendaftaran->jumlah_saudara }} saudara</td>
            </tr>
            <tr>
                <th>Status Pendaftaran</th>
                <td><span class="badge bg-info">{{ ucfirst($pendaftaran->status) }}</span></td>
            </tr>
            <tr>
                <th>Dokumen Pendukung</th>
                <td>
                    <a href="{{ asset('storage/' . $pendaftaran->dokumen_pendukung) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                        📄 Lihat Dokumen
                    </a>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="mt-4 d-flex justify-content-between">
        <a href="{{ route('pendaftaran.cetak') }}" class="btn btn-outline-success">🖨 Cetak PDF</a>
        <a href="{{ route('pendaftaran.edit') }}" class="btn btn-outline-primary">✏️ Edit Pendaftaran</a>
    </div>

</div>
@endsection
