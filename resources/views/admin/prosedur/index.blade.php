@extends('layouts.apps')

@section('title', 'Manajemen Prosedur Pendaftaran')

@section('content')
<div class="row">
    <div class="col-md-12 ">
        <form enctype="multipart/form-data" method="POST" action="{{ route('admin.prosedur.store') }}" class="mb-4 shadow-sm p-3 rounded bg-light">
        @csrf
        <div class="input-group">
            <input type="file" name="file_panduan"
                   class="form-control @error('file_panduan') is-invalid @enderror"
                   accept=".pdf"
                   required>
            <button class="btn btn-success">Tambah</button>
        </div>
        @error('deskripsi')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
        @enderror
    </form>
    </div>
<div class="col-md-12">
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
                                    <th style="width: 80%;">Deskripsi</th>
                                    <th style="width: 20%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($prosedur as $item)
                                    <tr>
                                        <td>
                                            <a href="{{ asset($item->file_path) }}" target="_blank">
                                                {{ $item->deskripsi }}
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ route('admin.prosedur.destroy', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('Yakin hapus prosedur ini?')">
                                                    🗑 Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="text-center text-muted fst-italic">
                                            Belum ada prosedur pendaftaran.
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
</div>    
@endsection
