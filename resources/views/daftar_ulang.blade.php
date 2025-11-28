@extends('layouts.apps')

@section('title', 'Daftar Ulang')

@section('content')

<div class="row">
    <div class="col-md-12">
       @if($pendaftaran)
            @if($pendaftaran->status=='pending')
            <div class="alert alert-warning">
                <h5><i class="icon fas fa-info"></i> Informasi!</h5>
                Anda belum melakukan administrasi. Silahkan menyelesaikan administrasi pendaftaran diSLB-B kami secara langsung.
                <br>Terima Kasih.
            </div>
            @elseif($pendaftaran->status=='diterima' or $pendaftaran->status=='diproses' or $pendaftaran->status=='ditolak')
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
                <th>Jenjang Sekolah</th>
                <td>{{ ($pendaftaran->JenjangSekolah->jenjang) }}</span></td>
            </tr>
            @if($daftarUlang)
            <tr>
                <th>Akta Kelahiran</th>
                <td>
                    @if($daftarUlang->akta_path)
                        <a href="{{ asset($daftarUlang->akta_path) }}" target="_blank">Lihat Berkas</a>
                    @else
                        Belum diunggah
                    @endif
                </td>
            </tr>
            <tr>
                <th>Kartu Keluarga</th>
                <td>
                    @if($daftarUlang->akta_path)
                        <a href="{{ asset($daftarUlang->kk_path) }}" target="_blank">Lihat Berkas</a>
                    @else
                        Belum diunggah
                    @endif
                </td>
            </tr>
            <tr>
                <th>KTP Orang Tua/Wali</th>
                <td>
                    @if($daftarUlang->ktp_path)
                        <a href="{{ asset($daftarUlang->ktp_path) }}" target="_blank">Lihat Berkas</a>
                    @else
                        Belum diunggah
                    @endif
                </td>
            </tr>
            <tr>
                <th>Surat Test Pendengaran</th>
                <td>
                    @if($daftarUlang->st_path)
                        <a href="{{ asset($daftarUlang->st_path) }}" target="_blank">Lihat Berkas</a>
                    @else
                        Belum diunggah
                    @endif
                </td>
            </tr>
            <tr>
                <th>Formulir Pendaftaran (Bertanda tangan)</th>
                <td>
                    @if($daftarUlang->form_path)
                        <a href="{{ asset($daftarUlang->form_path) }}" target="_blank">Lihat Berkas</a>
                    @else
                        Belum diunggah
                    @endif
                </td>
            </tr>
            <tr>
                <th>Bukti Pembayaran</th>
                <td>
                    @if($daftarUlang->bukti_path)
                        <a href="{{ asset($daftarUlang->bukti_path) }}" target="_blank">Lihat Berkas</a>
                    @else
                        Belum diunggah
                    @endif
                </td>
            </tr>
            @endif
            </tbody>
            </table>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Upload Berkas Daftar Ulang
            </button>
            @elseif($pendaftaran->status=='ditolak')
            <div class="alert alert-danger">
                <h5><i class="icon fas fa-info"></i> Informasi!</h5>
                Mohon Maaf Anda Belum Diterima Di Sekolah Kami. Tetap Semangat dan Jangan Menyerah Mencari Sekolah yang Tepat!
                <br>Terima Kasih.
            </div>
            @endif
        @else
            <div class="alert alert-info">
                <h5><i class="icon fas fa-info"></i> Informasi!</h5>
                Anda belum mengisi formulir pendaftaran. Silahkan mendaftar melalui menu <b>Formulir Pendaftaran</b>
                <br>Terima Kasih.
            </div>
        @endif
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <form action="{{route('daftar-ulang.update')}}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Berkas Daftar Ulang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12 form-group">
                <label>Upload Foto Akta Kelahiran</label>
                <input type="file" class="form-control" name="akta_kelahiran" accept="image/*, .pdf" required>
                <span class="text-danger">*Wajib Diisi, max file 10 mb dalam bentuk JPEG/PNG/PDF</span>
            </div>
            <div class="col-md-12 form-group">
                <label>Upload Foto Kartu Keluarga</label>
                <input type="file" class="form-control" name="kartu_keluarga" accept="image/*, .pdf" required>
                <span class="text-danger">*Wajib Diisi, Max file ukuran 10 mb dalam bentuk JPEG/PNG/PDF</span>
            </div>
            <div class="col-md-12 form-group">
                <label>Upload KTP Orang Tua atau Wali</label>
                <input type="file" class="form-control" name="ktp" accept="image/*, .pdf" required>
                <span class="text-danger">*Wajib Diisi, Max file ukuran 10 mb dalam bentuk JPEG/PNG/PDF</span>
            </div>
            <div class="col-md-12 form-group">
                <label>Upload Surat Test Pendengaran</label>
                <input type="file" class="form-control" name="surat_test_pendengaran" accept="image/*, .pdf" required>
                <span class="text-danger">*Wajib Diisi, Max file ukuran 10 mb dalam bentuk JPEG/PNG/PDF</span>
            </div>
            <div class="col-md-12 form-group">
                <label>Upload Formulir Pendaftaran (Bertanda tangan)</label>
                <input type="file" class="form-control" name="form_ttd" accept="image/*, .pdf" required>
                <span class="text-danger">*Wajib Diisi, Max file ukuran 10 mb dalam bentuk JPEG/PNG/PDF</span>
            </div>
            <div class="col-md-12 form-group">
                <label>Upload Bukti Pembayaran</label>
                <input type="file" class="form-control" name="bukti_bayar" accept="image/*, .pdf" required>
                <span class="text-danger">*Wajib Diisi, Max file ukuran 10 mb dalam bentuk JPEG/PNG/PDF</span>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Upload</button>
      </div>

    </div>
    </form>
  </div>
</div>
@endsection
@push('scripts')

@endpush