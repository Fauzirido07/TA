@extends('layouts.apps')

@section('title', 'Pilih Siswa untuk DiAsesmen')

@section('content')
<div class="row">
    <div class="col-md-12">
    <div class="mb-4">

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
    </div>
</div>
@endsection
