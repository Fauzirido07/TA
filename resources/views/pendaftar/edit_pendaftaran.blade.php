@extends('layouts.apps')

@section('title', 'Edit Form Pendaftaran Siswa Baru')

@section('content')

@if(!$pendaftaran)
    <div class="alert alert-info">
        <h5><i class="icon fas fa-info"></i> Informasi!</h5>
         Anda belum mengisi formulir pendaftaran. Silahkan mendaftar melalui menu <b>Formulir Pendaftaran</b>
        <br>Terima Kasih.
    </div>
@else

<div class="row">
    <div class="col-md-12 ">
        <form action="{{route('pendaftaran.update')}}" method="post" enctype="multipart/form-data" onsubmit="return confirm('Yakin data sudah benar?')">
            @csrf
            <input type="hidden" name="pendaftaran_id" value="{{$pendaftaran->id}}">
        <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title">Data Diri Siswa</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                    <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                    <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mt-3">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_lengkap" value="{{$pendaftaran->nama_lengkap}}" placeholder="Masukkan Nama Lengkap" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mt-3">
                            <label>Nomor Induk Asal</label>
                            <input type="number" class="form-control" name="nomor_induk_asal" value="{{$pendaftaran->nomor_induk_asal}}" placeholder="Masukkan Nomor Induk Asal" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mt-3">
                            <label>NISN</label>
                            <input type="number" class="form-control" name="nisn" value="{{$pendaftaran->nisn}}" placeholder="Masukkan NISN" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mt-3">
                            <label>NIK</label>
                            <input type="number" class="form-control" name="nik" value="{{$pendaftaran->nik}}" placeholder="Masukkan NIK" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mt-3">
                            <label>Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" value="{{$pendaftaran->tempat_lahir}}" placeholder="Masukkan tempat lahir" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mt-3">
                            <label>Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" placeholder="Masukkan tanggal lahir" required value="{{ $pendaftaran->tanggal_lahir->format('Y-m-d') }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mt-3">
                            <label>Jenis Kelamin</label>
                            <div class="form-check">
                                <input type="radio" class="form-input-check" name="jenis_kelamin" required value="L" @if($pendaftaran->jenis_kelamin == "L") checked @endif>Laki-Laki
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-input-check" name="jenis_kelamin" required value="P" @if($pendaftaran->jenis_kelamin == "P") checked @endif>Perempuan
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mt-3">
                            <label>Alamat Rumah</label>
                            <input type="text" class="form-control" name="alamat" value="{{$pendaftaran->alamat}}" placeholder="Masukkan Alamat Rumah" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mt-3">
                            <label>No Telepon Siswa</label>
                            <input type="number" class="form-control" name="telepon_siswa" value="{{$pendaftaran->telepon_siswa}}" placeholder="Masukkan no telepon siswa" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mt-3">
                            <label>Pendidikan Sebelumnya</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mt-3">
                            <label>Tamatan Dari</label>
                            <input type="text" class="form-control" name="tamatan_dari" value="{{$pendaftaran->tamatan_dari}}" placeholder="Masukkan Tempat Terakhir Menempuh Pendidikan" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mt-3">
                            <label>Tanggal STTB</label>
                            <input type="date" class="form-control" name="tgl_sttb" value="{{$pendaftaran->tgl_sttb}}" placeholder="Masukkan Tanggal STTB" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mt-3">
                            <label>No STTB</label>
                            <input type="text" class="form-control" name="no_sttb" value="{{$pendaftaran->no_sttb}}" placeholder="Masukkan No STTB" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mt-3">
                            <label>Lama Belajar</label>
                            <input type="text" class="form-control" name="lama_belajar" value="{{$pendaftaran->lama_belajar}}" placeholder="Masukkan Rentang Belajarnya" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mt-3">
                            <label>Pindahan Dari</label>
                            <input type="text" class="form-control" name="pindahan_dari" value="{{$pendaftaran->pindahan_dari}}" placeholder="Masukkan Asal Sekolah" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mt-3">
                            <label>Alasan</label>
                            <input type="text" class="form-control" name="alasan" value="{{$pendaftaran->alasan}}" placeholder="Masukkan Alasan Kepindahannya    " required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mt-3">
                            <label>Jenjang Sekolah</label>
                            <select class="form-control" name="jenjang_sekolah_id" required>
                                <option value="">-- Pilih Jenjang --</option>
                                @foreach($jenjang as $item)
                                <option value="{{ $item->id }}" @if($pendaftaran->jenjang_sekolah_id == $item->id) selected @endif>{{ $item->jenjang }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mt-3">
                            <label>Upload Foto 3x4 (Opsional Jika Ingin Mengganti Foto)</label>
                            <input type="file" class="form-control" name="foto" placeholder="Upload Foto 3x4 disini">
                            <span>
                                <a href="{{asset($pendaftaran->foto)}}" target="_blank">Lihat Foto Saat Ini</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-outline card-success mt-4">
            <div class="card-header">
                <h3 class="card-title">Data Diri Orang Tua Kandung</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                    <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                    <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                            <div class="form-group mt-3">
                                <label>Nama Lengkap Ayah</label>
                                <input type="text" class="form-control" name="nama_ayah" value="{{$orangtua->nama_ayah}}" placeholder="Masukkan Nama Lengkap Ayah" required>
                            </div>
                    </div>  
                    <div class="col-md-12">
                            <div class="form-group mt-3">
                                <label>Nama Lengkap Ibu</label>
                                <input type="text" class="form-control" name="nama_ibu" value="{{$orangtua->nama_ibu}}" placeholder="Masukkan Nama Lengkap Ibu" required>
                            </div>
                    </div>
                    <div class="col-md-12">
                            <div class="form-group mt-3">
                                <label>Alamat</label>
                                <input type="text" class="form-control" name="alamat_ortu" value="{{$orangtua->alamat_ortu}}" placeholder="Masukkan Alamat" required>
                            </div>
                    </div>
                    <div class="col-md-12">
                            <div class="form-group mt-3">
                                <label>No Telepon</label>
                                <input type="number" class="form-control" name="no_ortu" value="{{$orangtua->no_ortu}}" placeholder="Masukkan No Telepon" required>
                            </div>
                    </div>
                    <div class="col-md-12">
                            <div class="form-group mt-3">
                                <label>Pekerjaan Ayah</label>
                                <input type="text" class="form-control" name="pekerjaan_ayah" value="{{$orangtua->pekerjaan_ayah}}" placeholder="Masukkan Pekerjaan Ayah" required>
                            </div>
                    </div>
                    <div class="col-md-12">
                            <div class="form-group mt-3">
                                <label>Pekerjaan Ibu</label>
                                <input type="text" class="form-control" name="pekerjaan_ibu" value="{{$orangtua->pekerjaan_ibu}}" placeholder="Masukkan Pekerjaan Ibu" required>
                            </div>
                    </div>
                    <div class="col-md-12">
                            <div class="form-group mt-3">
                                <label>Pendidikan Terakhir Ayah</label>
                                <input type="text" class="form-control" name="pendidikan_ayah" value="{{$orangtua->pendidikan_ayah}}" placeholder="Masukkan Pendidikan Terakhir Ayah" required>
                            </div>
                    </div>
                    <div class="col-md-12">
                            <div class="form-group mt-3">
                                <label>Pendidikan Terakhir Ibu</label>
                                <input type="text" class="form-control" name="pendidikan_ibu" value="{{$orangtua->pendidikan_ibu}}" placeholder="Masukkan Pendidikan Terakhir Ibu" required>
                            </div>
                    </div>
                    <div class="col-md-12">
                            <div class="form-group mt-3">
                                <label>Penghasilan Ayah/bulan</label>
                                <input type="number" class="form-control" name="penghasilan_ayah" value="{{$orangtua->penghasilan_ayah}}" placeholder="Masukkan Penghasilan Ayah" required>
                            </div>
                    </div>
                    <div class="col-md-12">
                            <div class="form-group mt-3">
                                <label>Penghasilan Ibu/bulan</label>
                                <input type="number" class="form-control" name="penghasilan_ibu" value="{{$orangtua->penghasilan_ibu}}" placeholder="Masukkan PenghasilanIbu" required>
                            </div>
                    </div>
            </div>
        </div>
    </div>

        <div class="card card-outline card-success mt-4">
            <div class="card-header">
                <h3 class="card-title">Data Diri Wali</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                    <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                    <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                            <div class="form-group mt-3">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_wali" value="{{$orangtua->nama_wali}}" placeholder="Masukkan Nama Lengkap Wali" required>
                            </div>
                    </div>  
                    <div class="col-md-12">
                            <div class="form-group mt-3">
                                <label>Alamat</label>
                                <input type="text" class="form-control" name="alamat_wali" value="{{$orangtua->alamat_wali}}" placeholder="Masukkan Alamat Wali" required>
                            </div>
                    </div>
                    <div class="col-md-12">
                            <div class="form-group mt-3">
                                <label>No Telepon</label>
                                <input type="number" class="form-control" name="no_wali" value="{{$orangtua->no_wali}}" placeholder="Masukkan No Telepon Wali" required>
                            </div>
                    </div>
                    <div class="col-md-12">
                            <div class="form-group mt-3">
                                <label>Pendidikan Terakhir Wali</label>
                                <input type="text" class="form-control" name="pendidikan_wali" value="{{$orangtua->pendidikan_wali}}" placeholder="Masukkan Pendidikan Terakhir Wali" required>
                            </div>
                    </div>
                     <div class="col-md-12">
                            <div class="form-group mt-3">
                                <label>Pekerjaan Wali</label>
                                <input type="text" class="form-control" name="pekerjaan_wali" value="{{$orangtua->pekerjaan_wali}}" placeholder="Masukkan Pekerjaan Wali" required>
                            </div>
                    </div>
                    <div class="col-md-12">
                            <div class="form-group mt-3">
                                <label>Penghasilan Wali/bulan</label>
                                <input type="number" class="form-control" name="penghasilan_wali" value="{{$orangtua->penghasilan_wali}}" placeholder="Masukkan Penghasilan Wali" required>
                            </div>
                    </div>

            </div>
        </div>
    </div>

        <div class="card card-outline card-success mt-4">
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Simpan Data Diri</button>
            </div>
        </div>
        </form>
    </div>
</div>
@endif
@endsection