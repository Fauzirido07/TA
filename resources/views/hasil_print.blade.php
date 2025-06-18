<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cetak Hasil Asesmen</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 8px; text-align: left; }
        th { background-color: #f0f0f0; }
        .print-button { margin: 20px 0; text-align: right; }
    </style>
</head>
<body>
    <h2>Hasil Asesmen Calon Siswa</h2>

    <div class="print-button">
        <button onclick="window.print()">🖨 Cetak Halaman</button>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nama Pendaftar</th>
                <th>Skor</th>
                <th>Rekomendasi</th>
                <th>Hasil</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hasil as $item)
                <tr>
                    <td>{{ $item->pendaftaran->nama_lengkap }}</td>
                    <td>{{ $item->skor }}</td>
                    <td>{{ $item->rekomendasi }}</td>
                    <td>{{ $item->hasil_asesmen }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
