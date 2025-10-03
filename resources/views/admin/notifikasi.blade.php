@extends('layouts.app')

@section('title', 'Notifikasi')

@section('content')
<div class="container" style="max-width: 900px; margin: 30px auto;">
    <h2 class="mb-4 text-center">🔔 Notifikasi</h2>

    @forelse($notifikasi as $notif)
        <div class="alert alert-{{ $notif->status == 'dibaca' ? 'success' : 'warning' }} shadow-sm">
            {{ $notif->pesan }}
            <small class="d-block text-muted">{{ $notif->created_at->diffForHumans() }}</small>
        </div>
    @empty
        <div class="alert alert-info text-center shadow-sm">Tidak ada notifikasi baru.</div>
    @endforelse
</div>
@endsection
