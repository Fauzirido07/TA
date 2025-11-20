@extends('layouts.apps')

@section('title', 'Data Pendaftaran Saya')

@section('content')

@if(!$pendaftaran)
    <div class="alert alert-info">
        <h5><i class="icon fas fa-info"></i> Informasi!</h5>
         Anda belum mengisi formulir pendaftaran. Silahkan mendaftar melalui menu <b>Formulir Pendaftaran</b>
        <br>Terima Kasih.
    </div>
@else

<div class="row justify-content-center mt-4">
    <div class="col-md-8">

    <table class="table table-bordered">
        <thead>
            <tr>
                <th colspan="2" class="text-center bg-light">Data Diri Siswa</th>
            </tr>
        </thead>
        <tbody>
             <tr>
                <th>Foto 3 x 4</th>
                <td><img src="{{ asset($pendaftaran->foto) }}" alt="" style="height:100px"></td>
            </tr>
            <tr>
                <th width="30%">Nama Lengkap</th>
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
                <th>Tempat Lahir</th>
                <td>{{ $pendaftaran->tempat_lahir }}</td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td>{{ $pendaftaran->tanggal_lahir->format('d F Y')}}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $pendaftaran->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
            </tr>
            <tr>
                <th>Alamat Rumah</th>
                <td>{{ $pendaftaran->alamat }}</td>
            </tr>
            <tr>
                <th>No Telepon Siswa</th>
                <td>{{ $pendaftaran->telepon_siswa }} </td>
            </tr>
            <tr>
                <th>Tamatan Dari</th>
                <td>{{ ($pendaftaran->tamatan_dari) }}</span></td>
            </tr>
            <tr>
                <th>Tangal STTB</th>
                <td>{{ ($pendaftaran->tgl_sttb) }}</span></td>
            </tr>
            <tr>
                <th>No STTB</th>
                <td>{{ ($pendaftaran->no_sttb) }}</span></td>
            </tr>
             <tr>
                <th>Lama Belajar</th>
                <td>{{ ($pendaftaran->lama_belajar) }}</span></td>
            </tr>
             <tr>
                <th>Pindahan Dari</th>
                <td>{{ ($pendaftaran->pindahan_dari) }}</span></td>
            </tr>
            <tr>
                <th>Alasan</th>
                <td>{{ ($pendaftaran->alasan) }}</span></td>
            </tr>
            <tr>
                <th>Jenjang Sekolah</th>
                <td>{{ ($pendaftaran->JenjangSekolah->jenjang) }}</span></td>
            </tr>
        </tbody>
    </table>

    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th colspan="2" class="text-center bg-light">Data Diri Orang Tua Kandung</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th width="30%">Nama Lengkap Ayah</th>
                <td>{{ $orangtua->nama_ayah }}</td>
            </tr>
           <tr>
                <th>Nama Lengkap Ibu</th>
                <td>{{ $orangtua->nama_ibu }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $orangtua->alamat_ortu }}</td>
            </tr>
            <tr>
                <th>No Telepon</th>
                <td>{{ $orangtua->no_ortu }} </td>
            </tr>
            <tr>
                <th>Pekerjaan Ayah</th>
                <td>{{ ($orangtua->pekerjaan_ayah) }}</span></td>
            </tr>
            <tr>
                <th>Pekerjaan Ibu</th>
                <td>{{ ($orangtua->pekerjaan_ibu) }}</span></td>
            </tr>
            <tr>
                <th>Pendidikan Ayah</th>
                <td>{{ ($orangtua->pendidikan_ayah) }}</span></td>
            </tr>
            <tr>
                <th>Pendidikan Ibu</th>
                <td>{{ ($orangtua->pendidikan_ibu) }}</span></td>
            </tr>
            <tr>
                <th>Penghasilan Ayah</th>
                <td>{{ ($orangtua->penghasilan_ayah) }}</span></td>
            </tr>
            <tr>
                <th>Penghasilan Ibu</th>
                <td>{{ ($orangtua->penghasilan_ibu) }}</span></td>
            </tr>
        </tbody>
    </table>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th colspan="2" class="text-center bg-light">Data Diri Wali</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th width="30%">Nama Lengkap Wali</th>
                <td>{{ $orangtua->nama_wali }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $orangtua->alamat_wali }}</td>
            </tr>
            <tr>
                <th>No Telepon</th>
                <td>{{ $orangtua->no_wali }} </td>
            </tr>
            <tr>
                <th>Pendidikan Wali</th>
                <td>{{ ($orangtua->pendidikan_wali) }}</span></td>
            </tr>
            <tr>
                <th>Pekerjaan Wali</th>
                <td>{{ ($orangtua->pekerjaan_wali) }}</span></td>
            </tr>
            <tr>
                <th>Penghasilan Wali</th>
                <td>{{ ($orangtua->penghasilan_wali) }}</span></td>
            </tr>
        </tbody>
    </table>

    <div class="mt-4 d-flex justify-content-between">
        <a href="{{ route('pendaftaran.cetak') }}" class="btn btn-outline-success">🖨 Cetak PDF</a>
        <a href="{{ route('pendaftaran.edit') }}" class="btn btn-outline-primary">✏️ Edit Pendaftaran</a>
    </div>

    </div>
</div>
@endif
@endsection
