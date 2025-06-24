@extends('layouts.app')

@section('title', 'Daftar Asesmen yang Sudah Diisi')

@section('content')
<div class="container" style="max-width: 900px; margin: 30px auto;">

    <div class="mt-4">
        <a href="{{ route('guru.dashboard') }}" class="btn btn-outline-dark mb-4">
            ⬅ Kembali ke Dashboard
        </a>
    </div>

    <h2 class="mb-4 text-center">📋 Daftar Asesmen yang Sudah Diisi</h2>

    @if($asesmen->isEmpty())
        <div class="alert alert-warning text-center shadow-sm">
            <i class="bi bi-exclamation-circle-fill"></i> Belum ada asesmen yang Anda isi.
        </div>
    @else
        <div class="table-responsive shadow-sm">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light text-center">
                    <tr>
                        <th>ID Pendaftar</th>
                        <th>Nama Pendaftar</th>
                        <th>Skor</th>
                        <th>Rekomendasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($asesmen as $item)
                        <tr>
                            <td class="text-center">PD{{ str_pad($item->pendaftaran->id ?? 0, 3, '0', STR_PAD_LEFT) }}</td>
                            <td>{{ $item->pendaftaran->nama_lengkap ?? '-' }}</td>
                            <td class="text-center">{{ $item->skor }}</td>
                            <td>{{ $item->rekomendasi }}</td>
                            <td class="text-center">
                                <a href="{{ route('guru.asesmen.detail', $item->id) }}" class="btn btn-sm btn-outline-primary">
                                    🔍 Lihat Detail
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

</div>
@endsection
