@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mt-4">
        <a href="{{ route('guru.dashboard') }}" class="btn btn-outline-dark mb-4">⬅ Kembali ke Dashboard</a>
    </div>
    
    <h2 class="mb-4">📋 Daftar Asesmen yang Sudah Diisi</h2>

    @if($asesmen->isEmpty())
        <div class="alert alert-info">Belum ada asesmen yang Anda isi.</div>
    @else
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Nama Pendaftar</th>
                    <th>Skor</th>
                    <th>Rekomendasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($asesmen as $item)
                <tr>
                    <td>{{ $item->pendaftaran->nama_lengkap ?? '-' }}</td>
                    <td>{{ $item->skor }}</td>
                    <td>{{ $item->rekomendasi }}</td>
                    <td>
                        <a href="{{ route('guru.asesmen.detail', $item->id) }}" class="btn btn-sm btn-primary">🔍 Lihat Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

</div>
@endsection
