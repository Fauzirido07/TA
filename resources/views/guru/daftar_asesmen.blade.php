@extends('layouts.apps')

@section('title', 'Hasil Evaluasi Asesmen')

@section('content')
<div class="row">
    <div class="col-md-12">

    @if($asesmen->isEmpty())
        <div class="alert alert-warning text-center shadow-sm">
            <i class="bi bi-exclamation-circle-fill"></i> Belum ada asesmen yang Anda isi.
        </div>
    @else
        <div class="table-responsive shadow-sm">
            <table class="table table-bordered table-hover align-middle dataTable">
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
                            <td class="text-center">{{ $item->persen }}%</td>
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

</div>
@endsection
