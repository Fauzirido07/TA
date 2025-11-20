@extends('layouts.apps')
@section('title', 'Jadwal Asesmen Anda')
@section('content')
<div class="row">
    <div class="col-md-12">


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
</div>
@endsection
