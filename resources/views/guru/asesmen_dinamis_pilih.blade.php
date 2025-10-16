@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-3">
        <a href="{{ route('guru.dashboard') }}" class="btn btn-outline-dark">⬅ Kembali ke Dashboard</a>
    </div>

    <h2 class="mb-4">🧠 Pilih Siswa untuk Asesmen Dinamis</h2>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Nama Lengkap</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendaftar as $p)
                <tr>
                    <td>{{ $p->nama_lengkap }}</td>
                    <td>{{ $p->tanggal_lahir }}</td>
                    <td>{{ $p->alamat }}</td>
                    <td>
                        <a href="{{ route('guru.asesmen_dinamis.isi', $p->id) }}" class="btn btn-primary btn-sm">Isi Asesmen</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
