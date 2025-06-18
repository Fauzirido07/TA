    @extends('layouts.app')

    @section('content')
    <div class="container" style="max-width: 750px; margin: 30px auto;">

        <div class="mt-4">
            <a href="{{ route('dashboard.pendaftar') }}" class="btn btn-outline-dark mb-4">⬅ Kembali ke Dashboard</a>
        </div>

        <h2 class="mb-4 text-center">📄 Formulir Pendaftaran Masuk</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('daftar.post') }}" enctype="multipart/form-data">
            @csrf

            {{-- A. IDENTITAS ANAK --}}
            <fieldset class="border p-3 mb-4">
                <legend class="w-auto px-2">A. Identitas Anak</legend>

                <div class="mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Agama</label>
                        <input type="text" name="agama" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Anak ke-</label>
                        <input type="number" name="anak_ke" class="form-control" min="1" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Jumlah Saudara</label>
                        <input type="number" name="jumlah_saudara" class="form-control" min="1" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" rows="2" required></textarea>
                </div>
            </fieldset>

            {{-- B. RIWAYAT KELAHIRAN --}}
            <fieldset class="border p-3 mb-4">
                <legend class="w-auto px-2">B. Riwayat Kelahiran</legend>

                @foreach ([
                    'perkembangan_kehamilan' => 'Perkembangan Masa Kehamilan',
                    'penyakit_kehamilan' => 'Penyakit Selama Kehamilan',
                    'usia_kandungan' => 'Usia Kandungan Saat Lahir',
                    'proses_kelahiran' => 'Riwayat Proses Kelahiran',
                    'tempat_kelahiran' => 'Tempat Kelahiran',
                    'penolong_kelahiran' => 'Penolong Proses Kelahiran',
                    'gangguan_lahir' => 'Gangguan Saat Lahir',
                    'berat_bayi' => 'Berat Bayi (gram)',
                    'panjang_bayi' => 'Panjang Bayi (cm)',
                    'tanda_kelainan' => 'Tanda-tanda Kelainan'
                ] as $name => $label)
                    <div class="mb-3">
                        <label>{{ $label }}</label>
                        <input type="text" name="{{ $name }}" class="form-control" required>
                    </div>
                @endforeach
            </fieldset>

            {{-- Partial includes tetap seperti biasa --}}
            @include('pendaftaran.partial_balita')
            @include('pendaftaran.partial_fisik')
            @include('pendaftaran.partial_bahasa')
            @include('pendaftaran.partial_sosial')
            @include('pendaftaran.partial_pendidikan')

            @include('pendaftaran.partial_orangtua')

            {{-- Upload Dokumen --}}
            <fieldset class="border p-3 mb-4">
                <legend class="w-auto px-2">Upload Dokumen Pendukung</legend>
                <div class="mb-3">
                    <label>Upload Dokumen (PDF/JPG/PNG)</label>
                    <input type="file" name="dokumen_pendukung" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
                </div>
            </fieldset>

            <button type="submit" class="btn btn-success w-100">Kirim Pendaftaran</button>
        </form>
    </div>
    @endsection
