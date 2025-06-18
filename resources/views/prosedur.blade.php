@extends('layouts.app')
@section('title', 'Prosedur Pendaftaran')
@section('content')

<div class="mt-4">
    <a href="{{ route('dashboard.pendaftar') }}" class="btn btn-outline-dark mb-4">⬅ Kembali ke Dashboard</a>
</div>


<h2>Prosedur Pendaftaran</h2>
<p>Silakan ikuti langkah-langkah berikut untuk mendaftar:</p>
<ol>
    @foreach($prosedur as $p)
        <li>{{ $p->deskripsi }}</li>
    @endforeach
</ol>
@endsection