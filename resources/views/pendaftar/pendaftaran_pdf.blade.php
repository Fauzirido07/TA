<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Formulir Pendaftaran</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 6px;
        }
        .bordered th, .bordered td {
            border: 1px solid #333;
        }
        .center {
            text-align: center;
        }
        .kop-title {
            font-size: 18px;
            font-weight: bold;
        }
        .kop-sub {
            font-size: 14px;
        }
        .garis-tebal {
            border-bottom: 3px solid #000;
            margin-top: 4px;
            margin-bottom: 15px;
        }
        .foto {
            width: 110px;
            height: 140px;
            object-fit: cover;
            border: 1px solid #333;
        }
        .ttd-area {
            width: 250px;
            text-align: center;
            float: right;
            margin-top: 40px;
        }
    </style>
</head>
<body>

{{-- KOP SEKOLAH --}}
<table>
    <tr>
        <td width="15%" class="center">
            <img
                src="{{ public_path('assets/images/logo.png') }}"
                alt="Logo"
                style="width: 90px;"
            />
        </td>
        <td class="center">
            <div class="kop-title">SEKOLAH LUAR BIASA (SLB-B)</div>
            <div class="kop-title">DHARMA WANITA SIDOARJO</div>
            <div class="kop-sub">Jl. Raya Sidoarjo No. xx, Kabupaten Sidoarjo</div>
            <div class="kop-sub">Telp: 08xx-xxxx-xxxx | Email: slbdharmawanita@gmail.com</div>
        </td>
    </tr>
</table>
<div class="garis-tebal"></div>

<h3 class="center" style="margin-bottom: 20px">FORMULIR PENDAFTARAN PESERTA DIDIK BARU</h3>

{{-- DATA SISWA --}}
<table class="bordered" style="margin-bottom: 20px">
    <thead>
        <tr>
            <th colspan="2" class="center" style="background: #eee">Data Diri Siswa</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th width="30%">Foto 3x4</th>
            <td>
                @if($pendaftaran->foto)
                    <img src="{{ public_path($pendaftaran->foto) }}" class="foto">
                @else
                    Tidak ada foto
                @endif
            </td>
        </tr>
        <tr>
            <th>Nama Lengkap</th>
            <td>{{ $pendaftaran->nama_lengkap }}</td>
        </tr>
        <tr>
            <th>Nomor Induk Asal</th>
            <td>{{ $pendaftaran->nomor_induk_asal }}</td>
        </tr>
        <tr>
            <th>NISN</th>
            <td>{{ $pendaftaran->nisn }}</td>
        </tr>
        <tr>
            <th>NIK</th>
            <td>{{ $pendaftaran->nik }}</td>
        </tr>
        <tr>
            <th>Tempat, Tgl Lahir</th>
            <td>{{ $pendaftaran->tempat_lahir }}, {{ $pendaftaran->tanggal_lahir->format('d F Y') }}</td>
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
            <th>No Telepon</th>
            <td>{{ $pendaftaran->telepon_siswa }}</td>
        </tr>
        <tr>
            <th>Tamatan Dari</th>
            <td>{{ $pendaftaran->tamatan_dari }}</td>
        </tr>
        <tr>
            <th>Tanggal STTB</th>
            <td>{{ $pendaftaran->tgl_sttb }}</td>
        </tr>
        <tr>
            <th>No STTB</th>
            <td>{{ $pendaftaran->no_sttb }}</td>
        </tr>
        <tr>
            <th>Lama Belajar</th>
            <td>{{ $pendaftaran->lama_belajar }}</td>
        </tr>
        <tr>
            <th>Pindahan Dari</th>
            <td>{{ $pendaftaran->pindahan_dari }}</td>
        </tr>
        <tr>
            <th>Alasan Pindah</th>
            <td>{{ $pendaftaran->alasan }}</td>
        </tr>
    </tbody>
</table>


{{-- DATA ORANG TUA --}}
<table class="bordered">
    <thead>
        <tr>
            <th colspan="2" class="center" style="background: #eee">Data Orang Tua Kandung</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th width="30%">Nama Ayah</th>
            <td>{{ $orangtua->nama_ayah ?? '-' }}</td>
        </tr>
        <tr>
            <th>Nama Ibu</th>
            <td>{{ $orangtua->nama_ibu ?? '-' }}</td>
        </tr>
        <tr>
            <th>Alamat Orang Tua</th>
            <td>{{ $orangtua->alamat_ortu ?? '-' }}</td>
        </tr>
        <tr>
            <th>Nomor Telepon</th>
            <td>{{ $orangtua->no_ortu ?? '-' }}</td>
        </tr>
        <tr>
            <th>Pekerjaan Ayah</th>
            <td>{{ $orangtua->pekerjaan_ayah ?? '-' }}</td>
        </tr>
        <tr>
            <th>Pekerjaan Ibu</th>
            <td>{{ $orangtua->pekerjaan_ibu ?? '-' }}</td>
        </tr>
        <tr>
            <th>Pendidikan Ayah</th>
            <td>{{ $orangtua->pendidikan_ayah ?? '-' }}</td>
        </tr>
        <tr>
            <th>Pendidikan Ibu</th>
            <td>{{ $orangtua->pendidikan_ibu ?? '-' }}</td>
        </tr>
        <tr>
            <th>Penghasilan Ayah</th>
            <td>{{ $orangtua->penghasilan_ayah ?? '-' }}</td>
        </tr>
        <tr>
            <th>Penghasilan Ibu</th>
            <td>{{ $orangtua->penghasilan_ibu ?? '-' }}</td>
        </tr>
    </tbody>
</table>


{{-- DATA WALI --}}
<table class="bordered" style="margin-top: 20px">
    <thead>
        <tr>
            <th colspan="2" class="center" style="background: #eee">Data Wali</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th width="30%">Nama Wali</th>
            <td>{{ $orangtua->nama_wali ?? '-' }}</td>
        </tr>
        <tr>
            <th>Alamat Wali</th>
            <td>{{ $orangtua->alamat_wali ?? '-' }}</td>
        </tr>
        <tr>
            <th>No Telepon Wali</th>
            <td>{{ $orangtua->no_wali ?? '-' }}</td>
        </tr>
        <tr>
            <th>Pendidikan Wali</th>
            <td>{{ $orangtua->pendidikan_wali ?? '-' }}</td>
        </tr>
        <tr>
            <th>Pekerjaan Wali</th>
            <td>{{ $orangtua->pekerjaan_wali ?? '-' }}</td>
        </tr>
        <tr>
            <th>Penghasilan Wali</th>
            <td>{{ $orangtua->penghasilan_wali ?? '-' }}</td>
        </tr>
    </tbody>
</table>


{{-- TANDA TANGAN --}}
<div class="ttd-area">
    Sidoarjo, {{ now()->format('d F Y') }}<br>
    Orang Tua/Wali<br><br><br><br><br>
    (.......................................)
</div>

</body>
</html>
