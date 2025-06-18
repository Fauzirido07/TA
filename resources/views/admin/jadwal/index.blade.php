@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="mt-4">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark mb-4 ">⬅ Kembali ke Dashboard</a>
    </div>

    <h2 class="mb-4">🗓 Manajemen Jadwal Asesmen</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-4">
        <a href="{{ route('admin.jadwal.create') }}" class="btn btn-success">➕ Tambah Jadwal</a>
    </div>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Lokasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jadwal as $item)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</td>
                    <td>{{ $item->waktu }}</td>
                    <td>{{ $item->lokasi }}</td>
                    <td>
                        <a href="{{ route('admin.jadwal.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.jadwal.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus jadwal ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
