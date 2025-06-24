@extends('layouts.app')
@section('title', 'Prosedur Pendaftaran')
@section('content')

<div class="container" style="max-width: 750px; margin: 30px auto;">

    <div class="mt-4">
        <a href="{{ route('dashboard.pendaftar') }}" class="btn btn-outline-dark mb-4">
            ⬅ Kembali ke Dashboard
        </a>
    </div>

    <h2 class="mb-3 text-center">📌 Prosedur Pendaftaran</h2>

    <p class="mb-3">Silakan ikuti langkah-langkah berikut untuk melakukan pendaftaran di SLB-B Dharma Wanita Sidoarjo:</p>

    @if($prosedur->isEmpty())
        <div class="alert alert-warning text-center shadow-sm">
            <i class="bi bi-exclamation-circle-fill"></i> Belum ada prosedur yang ditambahkan.
        </div>
    @else
        <ol class="list-group list-group-numbered mb-4">
            @foreach($prosedur as $p)
                <li class="list-group-item">{{ $p->deskripsi }}</li>
            @endforeach
        </ol>
    @endif

</div>

@endsection
