@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Hasil Asesmen</h2>

    <ul class="list-group mb-4">
        <li class="list-group-item"><strong>Skor Total:</strong> {{ $asesmen->skor }}</li>
        <li class="list-group-item"><strong>Kesimpulan:</strong> {{ $asesmen->rekomendasi }}</li>
    </ul>

    @foreach(['pendengaran', 'berbakat', 'kesulitan'] as $kategori)
        <div class="mb-4">
            <h5 class="text-capitalize">Skor {{ $kategori }}</h5>
            @if(isset($jawaban[$kategori]))
                <ul class="list-group">
                    @foreach($jawaban[$kategori] as $i => $val)
                        <li class="list-group-item">
                            Gejala {{ $i + 1 }} - Skor: {{ $val }}
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">Tidak ada data.</p>
            @endif
        </div>
    @endforeach
</div>
@endsection
