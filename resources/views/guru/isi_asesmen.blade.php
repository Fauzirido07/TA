@extends('layouts.app')

@section('title', 'Form Asesmen')

@section('content')
<div class="container" style="max-width: 750px; margin: 30px auto;">

    <div class="mt-4">
        <a href="{{ route('guru.asesmen.pilih') }}" class="btn btn-outline-dark mb-4">
            ⬅ Kembali ke Pilih Siswa
        </a>
    </div>

    <h2 class="mb-3 text-center">📝 Form Asesmen Anak Berkebutuhan Khusus</h2>

    <div class="alert alert-info shadow-sm">
        Penilaian 1–5: <strong>1 = Tidak Pernah</strong> hingga <strong>5 = Sangat Sering</strong> terjadi.
    </div>

    <form action="{{ route('asesmen.store') }}" method="POST">
        @csrf
        <input type="hidden" name="pendaftaran_id" value="{{ $pendaftaran->id }}">

        @php
            $kategori = [
                'gangguan_penglihatan' => [
                    'Kurang melihat, tidak mampu mengenali orang pada jarak 6 meter',
                    'Kesulitan mengambil benda kecil di dekatnya',
                    'Tidak dapat menulis mengikuti garis lurus',
                    'Sering meraba dan tersandung waktu berjalan',
                    'Bagian bola mata keruh / bersisik / kering',
                    'Mata bergoyang terus',
                    'Peradangan hebat pada kedua bola mata',
                    'Kerusakan nyata pada kedua bola mata',
                    'Tidak dapat membedakan cahaya',
                ],
                'gangguan_pendengaran' => [
                    'Sering memiringkan kepala dalam usaha mendengar',
                    'Banyak perhatian terhadap getaran',
                    'Tidak ada reaksi terhadap suara di dekatnya',
                    'Terlambat perkembangan bahasa',
                    'Sering menggunakan isyarat dalam berkomunikasi',
                    'Kurang atau tidak tanggap bila diajak bicara',
                    'Tidak mampu mendengar (tuli)',
                ],
                'tunagrahita' => [
                    'Dua kali berturut-turut tidak naik kelas',
                    'Mampu membaca, menulis, berhitung sederhana',
                    'Tidak dapat berpikir abstrak',
                    'Kurang perhatian terhadap lingkungan',
                    'Sulit beradaptasi dengan situasi sosial',
                    'Perkembangan komunikasi terlambat',
                    'Kesulitan adaptasi di lingkungan baru',
                    'Kurang mampu mengurus diri sendiri',
                    'Sangat bergantung pada bantuan orang lain',
                ],
                'tunadaksa' => [
                    'Jari tangan kaku atau tidak dapat menggenggam',
                    'Bagian anggota tubuh tidak sempurna',
                    'Cacat pada alat gerak',
                    'Gerakan tidak sempurna atau tidak terkendali',
                    'Otot tubuh kaku, lumpuh, atau layu',
                ],
                'tunalaras' => [
                    'Mudah marah dan emosional',
                    'Menentang otoritas',
                    'Melakukan tindakan agresif atau merusak',
                    'Melanggar norma sosial atau hukum',
                ],
                'berbakat' => [
                    'Membaca pada usia lebih muda',
                    'Membaca lebih cepat dan banyak',
                    'Perbendaharaan kata luas',
                    'Rasa ingin tahu yang kuat',
                    'Inisiatif tinggi & mandiri',
                    'Senang mencoba hal baru',
                    'Daya konsentrasi tinggi',
                    'Pola pikir kreatif dan kritis',
                ],
                'lamban_belajar' => [
                    'Lambat tangkap terhadap pelajaran',
                    'Sering lambat menyelesaikan tugas akademik',
                    'Prestasi belajar selalu rendah',
                    'Pernah tidak naik kelas',
                ],
                'kesulitan_belajar' => [
                    'Kesulitan membaca (disleksia)',
                    'Kesulitan menulis (disgrafia)',
                    'Kesulitan berhitung (diskalkulia)',
                ],
            ];
        @endphp

        @foreach($kategori as $key => $pertanyaan)
            <h4 class="mt-4">{{ ucwords(str_replace('_', ' ', $key)) }}</h4>
            @foreach($pertanyaan as $i => $teks)
                <div class="mb-3">
                    <label>{{ $i + 1 }}. {{ $teks }}</label>
                    <input type="number" 
                           name="{{ $key }}[{{ $i }}]" 
                           class="form-control" 
                           min="1" max="5" required>
                </div>
            @endforeach
        @endforeach

        <h4 class="mt-4">🧾 Kesimpulan Observasi</h4>
        <textarea name="kesimpulan" class="form-control" rows="3" placeholder="Tulis kesimpulan Anda berdasarkan hasil pengamatan..." required></textarea>

        <button type="submit" class="btn btn-success mt-4 w-100">
            💾 Simpan Asesmen
        </button>
    </form>
</div>
@endsection
