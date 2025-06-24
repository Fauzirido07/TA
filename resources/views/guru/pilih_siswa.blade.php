@extends('layouts.app')

@section('title', 'Pilih Siswa untuk Asesmen')

@section('content')
<div class="container" style="max-width: 900px; margin: 30px auto;">

    <div class="mt-4">
        <a href="{{ route('guru.dashboard') }}" class="btn btn-outline-dark mb-4">
            ⬅ Kembali ke Dashboard
        </a>
    </div>

    <h2 class="mb-4 text-center">🧠 Pilih Siswa untuk Asesmen</h2>

    @if($pendaftar->isEmpty())
        <div class="alert alert-warning text-center shadow-sm">
            <i class="bi bi-exclamation-circle-fill"></i> Belum ada data pendaftar tersedia.
        </div>
    @else
        <div class="table-responsive shadow-sm">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light text-center">
                    <tr>
                        <th>ID Pendaftar</th>
                        <th>Nama Lengkap</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pendaftar as $p)
                        <tr>
                            <td class="text-center">PD{{ str_pad($p->id, 3, '0', STR_PAD_LEFT) }}</td>
                            <td>{{ $p->nama_lengkap }}</td>
                            <td>{{ \Carbon\Carbon::parse($p->tanggal_lahir)->format('d-m-Y') }}</td>
                            <td>{{ $p->alamat }}</td>
                            <td class="text-center">
                                @if($p->asesmen)
                                    <span class="badge bg-success">✅ Sudah Diasesmen</span>
                                @else
                                    <a href="{{ route('guru.asesmen.isi', $p->id) }}" class="btn btn-sm btn-outline-primary">
                                        ✍️ Isi Asesmen
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

</div>
@endsection
