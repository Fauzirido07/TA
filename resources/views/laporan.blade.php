@extends('layouts.app')
@section('title', 'Laporan Asesmen')
@section('content')
<h2>Cetak Laporan Asesmen</h2>
<table>
    <tr>
        <th>Nama</th>
        <th>Skor</th>
        <th>Rekomendasi</th>
        <th>Tanggal</th>
    </tr>
    @foreach ($hasil as $item)
    <tr>
        <td>{{ $item->pendaftar->nama }}</td>
        <td>{{ $item->skor }}</td>
        <td>{{ $item->rekomendasi }}</td>
        <td>{{ $item->created_at }}</td>
    </tr>
    @endforeach
</table>
<button onclick="window.print()">Cetak Laporan</button>
@endsection
