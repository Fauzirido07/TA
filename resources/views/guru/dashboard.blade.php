@extends('layouts.apps')

@section('title', 'Dashboard Guru')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="mb-4 text-center">
            <h2 class="fw-semibold">Selamat Datang di Dashboard Guru</h2>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Jadwal Asesmen Siswa</h5>
            </div>

            <div class="card-body">
                @if($jadwals->isEmpty())
                    <p class="text-center">Tidak ada jadwal asesmen untuk saat ini.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered dataTable">
                            <thead>
                                <tr>
                                    <th>ID Pendaftar</th>
                                    <th>Nama</th>
                                    <th>Tanggal</th>
                                    <th>Waktu</th>
                                    <th>Lokasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jadwals as $jadwal)
                                    <tr>
                                        <td>PD{{ str_pad($jadwal->pendaftaran_id, 3, '0', STR_PAD_LEFT) }}</td>
                                        <td>{{ $jadwal->pendaftaran->nama_lengkap }}</td>
                                        <td>{{ \Carbon\Carbon::parse($jadwal->tanggal)->format('d M Y') }}</td>
                                        <td>{{ $jadwal->waktu }}</td>
                                        <td>{{ $jadwal->lokasi }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
