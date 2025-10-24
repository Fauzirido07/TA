@extends('layouts.apps')

@section('title', 'Manajemen Jadwal Asesmen')

@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="mb-4 text-end">
        <a href="{{ route('admin.jadwal.create') }}" class="btn btn-success">
            ➕ Tambah Jadwal
        </a>
        </div>

        <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title">List</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                    <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                    <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                                <div class="table-responsive shadow-sm">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light text-center">
                    <tr>
                        <th style="width: 20%;">Nama</th>
                        <th style="width: 20%;">Tanggal</th>
                        <th style="width: 20%;">Waktu</th>
                        <th style="width: 20%;">Lokasi</th>
                        <th style="width: 20%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jadwal as $item)
                        <tr>
                            <td>{{ $item->pendaftaran->nama_lengkap }}</td>
                            <td class="text-center">{{ $item->tanggal->format('d F Y') }}</td>
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
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
