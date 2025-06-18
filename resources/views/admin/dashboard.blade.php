@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h2 class="mb-4">Dashboard Admin</h2>

    <div class="row justify-content-center gy-3">
        <div class="col-md-4">
            <a href="{{ route('admin.jadwal') }}" class="btn btn-outline-warning w-100 p-3">
                🗓 Kelola Jadwal Asesmen
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('admin.users') }}" class="btn btn-outline-primary w-100 p-3">
                👥 Manajemen Guru & Staff
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('admin.prosedur') }}" class="btn btn-outline-info w-100 p-3">
                📌 Kelola Prosedur Pendaftaran
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('admin.chart') }}" class="btn btn-outline-success w-100 p-3">
                📈 Monitoring Asesmen
            </a>
        </div>
    </div>
</div>
@endsection
