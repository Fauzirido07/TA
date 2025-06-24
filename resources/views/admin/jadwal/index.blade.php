@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 900px; margin: 30px auto;">

    <div class="mt-4">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark mb-4">⬅ Kembali ke Dashboard</a>
    </div>

    <h2 class="mb-4 text-center fw-bold">🗓 Manajemen Jadwal Asesmen</h2>

    <div class="mb-4 text-end">
        <a href="{{ route('admin.jadwal.create') }}" class="btn btn-success">
            ➕ Tambah Jadwal
        </a>
    </div>

    <div class="table-responsive shadow-sm">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light text-center">
                <tr>
                    <th style="width: 25%;">Tanggal</th>
                    <th style="width: 20%;">Waktu</th>
                    <th style="width: 30%;">Lokasi</th>
                    <th style="width: 25%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jadwal as $item)
                    <tr>
                        <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</td>
                        <td class="text-center">{{ $item->waktu }}</td>
                        <td>{{ $item->lokasi }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.jadwal.edit', $item->id) }}" class="btn btn-sm btn-outline-warning me-1">
                                ✏️ Edit
                            </a>
                            <form action="{{ route('admin.jadwal.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Yakin hapus jadwal ini?')">
                                    🗑 Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted fst-italic">
                            Belum ada jadwal asesmen yang ditambahkan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
