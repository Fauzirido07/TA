@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-start mb-3">
        <a href="{{ route('dashboard.pendaftar') }}" class="btn btn-outline-dark">⬅ Kembali ke Dashboard</a>
    </div>

    <h2 class="mb-4">🔔 Notifikasi</h2>

    @forelse($notifikasi as $notif)
        <div class="alert alert-{{ $notif->status == 'dibaca' ? 'success' : 'warning' }}">
            {{ $notif->pesan }}
            <small class="d-block text-muted">{{ \Carbon\Carbon::parse($notif->created_at)->diffForHumans() }}</small>
        </div>
    @empty
        <div class="alert alert-info">Tidak ada notifikasi baru.</div>
    @endforelse
</div>
@endsection
