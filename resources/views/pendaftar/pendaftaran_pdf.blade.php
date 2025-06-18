<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Formulir Pendaftaran</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        h2 { text-align: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 5px; }
        th { background-color: #eee; }
    </style>
</head>
<body>
    <h2>Formulir Pendaftaran</h2>

    <table>
        <tr>
            <th>Nama Lengkap</th>
            <td>{{ $pendaftaran->nama_lengkap }}</td>
        </tr>
        <tr>
            <th>Tempat, Tanggal Lahir</th>
            <td>{{ $pendaftaran->tempat_lahir }}, {{ \Carbon\Carbon::parse($pendaftaran->tanggal_lahir)->translatedFormat('d F Y') }}</td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td>{{ $pendaftaran->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $pendaftaran->alamat }}</td>
        </tr>
        <tr>
            <th>Status Anak</th>
            <td>{{ $pendaftaran->status_anak }}</td>
        </tr>
        <tr>
            <th>Anak ke-</th>
            <td>{{ $pendaftaran->anak_ke }} dari {{ $pendaftaran->jumlah_saudara }} saudara</td>
        </tr>
        {{-- Tambahkan field lain sesuai kebutuhan --}}
    </table>

    <p style="text-align:right; margin-top:50px;">
        Tanggal Cetak: {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
    </p>

</body>
</html>
