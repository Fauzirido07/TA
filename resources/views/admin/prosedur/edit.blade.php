@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Prosedur</h2>

    <form method="POST" action="{{ route('admin.prosedur.update', $prosedur->id) }}">
        @csrf
        <div class="mb-3">
            <label>Deskripsi Prosedur</label>
            <input type="text" name="deskripsi" class="form-control" value="{{ $prosedur->deskripsi }}" required>
        </div>
        <button class="btn btn-success">Simpan Perubahan</button>
        <a href="{{ route('admin.prosedur') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
