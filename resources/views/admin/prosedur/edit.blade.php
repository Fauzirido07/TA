@extends('layouts.app')

@section('title', 'Edit Prosedur')

@section('content')
<div class="container" style="max-width: 900px; margin: 30px auto;">

    <div class="mt-4">
        <a href="{{ route('admin.prosedur') }}" class="btn btn-outline-dark mb-4">
            ⬅ Kembali ke Manajemen Prosedur
        </a>
    </div>

    <h2 class="mb-4 text-center">✏️ Edit Prosedur Pendaftaran</h2>

    @if ($errors->any())
        <div class="alert alert-danger shadow-sm">
            <h6>Mohon perbaiki kesalahan berikut:</h6>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.prosedur.update', $prosedur->id) }}" class="shadow-sm p-3 rounded bg-light">
        @csrf
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi Prosedur</label>
            <input type="text" id="deskripsi" name="deskripsi"
                   class="form-control @error('deskripsi') is-invalid @enderror"
                   value="{{ old('deskripsi', $prosedur->deskripsi) }}" required>
            @error('deskripsi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">💾 Simpan Perubahan</button>
            <a href="{{ route('admin.prosedur') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>

</div>
@endsection
