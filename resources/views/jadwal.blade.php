@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 750px; margin: 30px auto;">

    <div class="mt-4">
        <a href="{{ route('dashboard.pendaftar') }}" class="btn btn-outline-dark mb-4">
            ⬅ Kembali ke Dashboard
        </a>
    </div>

    <h2 class="mb-4 text-center">🗓 Jadwal Asesmen Anda</h2>

    @if($jadwal->isEmpty())
        <div class="alert alert-warning text-center shadow-sm">
            <i class="bi bi-info-circle-fill"></i> Belum ada jadwal asesmen yang dijadwalkan untuk Anda.
        </div>
    @else
        <div class="table-responsive shadow-sm">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-light text-center">
                    <tr>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Lokasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jadwal as $item)
                        <tr>
                            <td class="text-center">
                                {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                            </td>
                            <td class="text-center">{{ $item->waktu }}</td>
                            <td>{{ $item->lokasi }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

</div>
@endsection
