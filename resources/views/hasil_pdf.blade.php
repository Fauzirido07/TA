<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PDF Hasil Asesmen</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        h2 { text-align: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 5px; }
        th { background-color: #ddd; }
    </style>
</head>
<body>
    <h2>Laporan Hasil Asesmen</h2>
    <table>
        <thead>
            <tr>
                <th>Nama Pendaftar</th>
                <th>Skor</th>
                <th>Rekomendasi</th>
                <th>Jawaban Lengkap</th>
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
