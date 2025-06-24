@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 750px; margin: 30px auto;">

    <div class="mt-4">
        <a href="{{ route('dashboard.pendaftar') }}" class="btn btn-outline-dark mb-4">
            ⬅ Kembali ke Dashboard
        </a>
    </div>

    <h2 class="mb-4 text-center">Hasil Asesmen Anda</h2>

    @if($asesmen)
        <div class="table-responsive shadow-sm">
            <table class="table table-bordered table-striped align-middle">
                <tbody>
                    <tr>
                        <th>Skor</th>
                        <td>{{ $asesmen->skor }}</td>
                    </tr>
                    <tr>
                        <th>Rekomendasi</th>
                        <td>{{ $asesmen->rekomendasi }}</td>
                    </tr>
                    <tr>
                        <th>Detail Jawaban</th>
                        <td>{{ $asesmen->hasil_asesmen }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-3 text-center">
            <a href="{{ route('hasil.pdf') }}" class="btn btn-outline-primary me-2">📄 Unduh PDF</a>
            <a href="{{ route('dashboard.pendaftar') }}" class="btn btn-secondary">⬅ Kembali ke Dashboard</a>
        </div>
    @else
        <div class="alert alert-info text-center shadow-sm">
            Hasil asesmen Anda belum tersedia.
        </div>
    @endif

</div>
@endsection
