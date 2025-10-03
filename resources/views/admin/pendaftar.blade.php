@extends('layouts.app')

@section('title', 'Manajemen Pendaftar')

@section('content')
<div class="container" style="max-width: 900px; margin: 30px auto;">

    <div class="mt-4 d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark">
            ⬅ Kembali ke Dashboard
        </a>
    </div>

    <h2 class="mb-4 text-center">📋 Manajemen Pendaftar</h2>~

    @if($pendaftar->isEmpty())
        <div class="alert alert-warning text-center shadow-sm">
            <i class="bi bi-exclamation-circle-fill"></i> Belum ada pendaftar.
        </div>
    @else
        <div class="table-responsive shadow-sm">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light text-center">
                    <tr>
                        <th>ID Pendaftar</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Status</th>
                        <th style="min-width: 140px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pendaftar as $item)
                    <tr>
                        <td class="text-center">PD{{ str_pad($item->id, 3, '0', STR_PAD_LEFT) }}</td>
                        <td>{{ $item->nama_lengkap }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_lahir)->format('d-m-Y') }}</td>
                        <td class="text-center">
                            <span class="badge 
                                @if($item->status === 'pending') bg-warning
                                @elseif($item->status === 'diproses') bg-info
                                @elseif($item->status === 'diterima') bg-success
                                @else bg-danger @endif">
                                {{ ucfirst($item->status) }}
                            </span>
                        </td>
                        <td>
                            <form action="{{ route('admin.pendaftar.updateStatus', $item->id) }}" method="POST" class="d-flex gap-2">
                                @csrf
                                <select name="status" class="form-select form-select-sm" required>
                                    <option value="pending" {{ $item->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="diproses" {{ $item->status === 'diproses' ? 'selected' : '' }}>Diproses</option>
                                    <option value="diterima" {{ $item->status === 'diterima' ? 'selected' : '' }}>Diterima</option>
                                    <option value="ditolak" {{ $item->status === 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                </select>
                                <button type="submit" class="btn btn-sm btn-success">Update</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

</div>
@endsection
