@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mt-4">
        <a href="{{ route('guru.asesmen.pilih') }}" class="btn btn-outline-dark mb-4">⬅ Kembali ke Pilih Siswa</a>
    </div>

    <h2 class="mb-4">Form Asesmen Anak Berkebutuhan Khusus</h2>

    <form action="{{ route('asesmen.store') }}" method="POST">
        @csrf

        <input type="hidden" name="pendaftaran_id" value="{{ $pendaftaran->id }}">

        {{-- PETUNJUK --}}
        <div class="alert alert-info">
            Penilaian 1–5: <strong>1 = Tidak pernah</strong> hingga <strong>5 = Sangat sering</strong> terjadi.
        </div>

        {{-- A. Gangguan Penglihatan --}}
        <h4>A. Gangguan Penglihatan</h4>
        @php
            $penglihatan = [
                'Kurang melihat, tidak mampu mengenali orang pada jarak 6 meter',
                'Kesulitan mengambil benda kecil di dekatnya',
                'Tidak dapat menulis mengikuti garis lurus',
                'Sering meraba dan tersandung waktu berjalan',
                'Bagian bola mata keruh / bersisik / kering',
                'Mata bergoyang terus',
                'Peradangan hebat pada kedua bola mata',
                'Kerusakan nyata pada kedua bola mata',
                'Tidak dapat membedakan cahaya',
            ];
        @endphp
        @foreach($penglihatan as $index => $item)
        <div class="mb-3">
            <label>{{ $index+1 }}. {{ $item }}</label>
            <input type="number" name="penglihatan[{{ $index }}]" class="form-control" min="1" max="5" required>
        </div>
        @endforeach

        {{-- B. Gangguan Pendengaran --}}
        <h4 class="mt-4">B. Gangguan Pendengaran</h4>
        @php
            $pendengaran = [
                'Sering memiringkan kepala dalam usaha mendengar',
                'Banyak perhatian terhadap getaran',
                'Tidak ada reaksi terhadap suara di dekatnya',
                'Terlambat perkembangan bahasa',
                'Sering menggunakan isyarat dalam berkomunikasi',
                'Kurang atau tidak tanggap bila diajak bicara',
                'Tidak mampu mendengar (tuli)',
            ];
        @endphp
        @foreach($pendengaran as $index => $item)
        <div class="mb-3">
            <label>{{ $index+1 }}. {{ $item }}</label>
            <input type="number" name="pendengaran[{{ $index }}]" class="form-control" min="1" max="5" required>
        </div>
        @endforeach

        {{-- C. Tunagrahita --}}
        <h4 class="mt-4">C. Tunagrahita</h4>
        @php
            $tunagrahita = [
                'Dua kali berturut-turut tidak naik kelas',
                'Mampu membaca, menulis, berhitung sederhana',
                'Tidak dapat berpikir abstrak',
                'Kurang perhatian terhadap lingkungan',
                'Sulit beradaptasi dengan situasi sosial',
                'Perkembangan komunikasi terlambat',
                'Kesulitan adaptasi di lingkungan baru',
                'Kurang mampu mengurus diri sendiri',
                'Sangat bergantung pada bantuan orang lain',
            ];
        @endphp
        @foreach($tunagrahita as $index => $item)
        <div class="mb-3">
            <label>{{ $index+1 }}. {{ $item }}</label>
            <input type="number" name="tunagrahita[{{ $index }}]" class="form-control" min="1" max="5" required>
        </div>
        @endforeach

        {{-- D. Tunadaksa --}}
        <h4 class="mt-4">D. Tunadaksa (Kelainan Gerak Tubuh)</h4>
        @php
            $tunadaksa = [
                'Jari tangan kaku atau tidak dapat menggenggam',
                'Bagian anggota tubuh tidak sempurna',
                'Cacat pada alat gerak',
                'Gerakan tidak sempurna atau tidak terkendali',
                'Otot tubuh kaku, lumpuh, atau layu',
            ];
        @endphp
        @foreach($tunadaksa as $index => $item)
        <div class="mb-3">
            <label>{{ $index+1 }}. {{ $item }}</label>
            <input type="number" name="tunadaksa[{{ $index }}]" class="form-control" min="1" max="5" required>
        </div>
        @endforeach

        {{-- E. Tunalaras --}}
        <h4 class="mt-4">E. Tunalaras (Emosi dan Perilaku)</h4>
        @php
            $tunalaras = [
                'Mudah marah dan emosional',
                'Menentang otoritas',
                'Melakukan tindakan agresif atau merusak',
                'Melanggar norma sosial atau hukum',
            ];
        @endphp
        @foreach($tunalaras as $index => $item)
        <div class="mb-3">
            <label>{{ $index+1 }}. {{ $item }}</label>
            <input type="number" name="tunalaras[{{ $index }}]" class="form-control" min="1" max="5" required>
        </div>
        @endforeach

        {{-- F. Anak Berbakat --}}
        <h4 class="mt-4">F. Anak Berbakat</h4>
        @php
            $berbakat = [
                'Membaca pada usia lebih muda',
                'Membaca lebih cepat dan banyak',
                'Perbendaharaan kata luas',
                'Rasa ingin tahu yang kuat',
                'Inisiatif tinggi & mandiri',
                'Senang mencoba hal baru',
                'Daya konsentrasi tinggi',
                'Pola pikir kreatif dan kritis',
            ];
        @endphp
        @foreach($berbakat as $index => $item)
        <div class="mb-3">
            <label>{{ $index+1 }}. {{ $item }}</label>
            <input type="number" name="berbakat[{{ $index }}]" class="form-control" min="1" max="5" required>
        </div>
        @endforeach

        {{-- G. Anak Lamban Belajar --}}
        <h4 class="mt-4">G. Anak Lamban Belajar</h4>
        @php
            $lamban_belajar = [
                'Lambat tangkap terhadap pelajaran',
                'Sering lambat menyelesaikan tugas akademik',
                'Prestasi belajar selalu rendah',
                'Pernah tidak naik kelas',
            ];
        @endphp
        @foreach($lamban_belajar as $index => $item)
        <div class="mb-3">
            <label>{{ $index+1 }}. {{ $item }}</label>
            <input type="number" name="lamban_belajar[{{ $index }}]" class="form-control" min="1" max="5" required>
        </div>
        @endforeach

        {{-- H. Kesulitan Belajar Spesifik --}}
        <h4 class="mt-4">H. Anak Kesulitan Belajar Spesifik</h4>
        @php
            $kesulitan_spesifik = [
                'Kesulitan membaca (disleksia)',
                'Kesulitan menulis (disgrafia)',
                'Kesulitan berhitung (diskalkulia)',
            ];
        @endphp
        @foreach($kesulitan_spesifik as $index => $item)
        <div class="mb-3">
            <label>{{ $index+1 }}. {{ $item }}</label>
            <input type="number" name="kesulitan_spesifik[{{ $index }}]" class="form-control" min="1" max="5" required>
        </div>
        @endforeach

        {{-- Kesimpulan --}}
        <h4 class="mt-4">Kesimpulan Observasi</h4>
        <textarea name="kesimpulan" class="form-control" rows="3" placeholder="Tulis kesimpulan Anda berdasarkan hasil pengamatan..." required></textarea>

        <button type="submit" class="btn btn-success mt-4">Simpan Asesmen</button>
    </form>

</div>
@endsection
