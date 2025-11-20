@extends('layouts.apps')
@section('title', 'Prosedur Pendaftaran')
@section('content')

<div class="row">
    <div class="col-md-12">
    <p class="mb-3">Silakan ikuti langkah-langkah berikut untuk melakukan pendaftaran di SLB-B Dharma Wanita Sidoarjo:</p>

    @if(!$prosedur)
        <div class="alert alert-warning text-center shadow-sm">
            <i class="bi bi-exclamation-circle-fill"></i> Belum ada prosedur yang ditambahkan.
        </div>
    @else
        <a href="{{ asset($prosedur->file_path) }}" class="btn btn-primary" target="_blank">
            Lihat Prosedur Pendaftaran
        </a>
    @endif
    </div>
</div>

@endsection
