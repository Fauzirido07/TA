@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="mt-4">
        <a href="{{ route('dashboard.pendaftar') }}" class="btn btn-outline-dark mb-4">⬅ Kembali ke Dashboard</a>
    </div>

    <h2 class="mb-4">🗓 Jadwal Asesmen Anda</h2>

    @if($jadwal->isEmpty())
        <div class="alert alert-info">
            Belum ada jadwal asesmen yang dijadwalkan untuk Anda.
        </div>
    @else
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Lokasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jadwal as $item)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</td>
                        <td>{{ $item->waktu }}</td>
                        <td>{{ $item->lokasi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

</div>
@endsection
