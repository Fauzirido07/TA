<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\OrangTua;
use App\Models\DokumenPendaftaran;
use App\Models\Notifikasi;
use App\Models\Asesmen;
use App\Models\User;
use App\Models\JenjangSekolah;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PendaftaranController extends Controller
{
    public function create()
    {
        $pendaftaran = Pendaftaran::where('user_id', auth()->id())->first();
        $jenjang = JenjangSekolah::all();

        return view('form_pendaftaran', compact('pendaftaran', 'jenjang'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'nomor_induk_asal' => 'required|string|max:10',
            'nisn' => 'required|string|max:10',
            'nik' => 'required|string|max:16',
            'tempat_lahir' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string| max:500',
            'telepon_siswa' => 'required|string|max:20',
            'tamatan_dari' => 'required|string|max:255',
            'tgl_sttb' => 'required|date',
            'no_sttb' => 'required|string|max:100',
            'lama_belajar' => 'required|string|max:50',
            'pindahan_dari' => 'nullable|string|max:255',
            'alasan' => 'nullable|string| max:500',
            'jenjang_sekolah_id' => 'required|exists:jenjang_sekolah,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $validated['user_id'] = auth()->id();
        $pendaftaran = new Pendaftaran();
        $pendaftaran->user_id = auth()->id();
        $pendaftaran->nama_lengkap = $request['nama_lengkap'];
        $pendaftaran->nomor_induk_asal = $request['nomor_induk_asal'];
        $pendaftaran->nisn = $request['nisn'];
        $pendaftaran->nik = $request['nik'];
        $pendaftaran->tempat_lahir = $request['tempat_lahir'];
        $pendaftaran->tanggal_lahir = $request['tanggal_lahir'];
        $pendaftaran->jenis_kelamin = $request['jenis_kelamin'];
        $pendaftaran->alamat = $request['alamat'];
        $pendaftaran->telepon_siswa = $request['telepon_siswa'];
        $pendaftaran->tamatan_dari = $request['tamatan_dari'];
        $pendaftaran->tgl_sttb = $request['tgl_sttb'];
        $pendaftaran->no_sttb = $request['no_sttb'];
        $pendaftaran->lama_belajar = $request['lama_belajar'];
        $pendaftaran->pindahan_dari = $request['pindahan_dari'];
        $pendaftaran->alasan = $request['alasan'];
        $pendaftaran->jenjang_sekolah_id = $request['jenjang_sekolah_id'];
         if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('uploads/dokumen', 'public_html');
            $pendaftaran->foto = $path;
        }
        $pendaftaran->save();

        $orangTua = new OrangTua();
        $orangTua->pendaftaran_id = $pendaftaran->id;
        $orangTua->nama_ayah = $request['nama_ayah'];
        $orangTua->nama_ibu = $request['nama_ibu'];
        $orangTua->alamat_ortu = $request['alamat_ortu'];
        $orangTua->no_ortu = $request['no_ortu'];
        $orangTua->pekerjaan_ayah = $request['pekerjaan_ayah'];
        $orangTua->pekerjaan_ibu = $request['pekerjaan_ibu'];
        $orangTua->pendidikan_ayah = $request['pendidikan_ayah'];
        $orangTua->pendidikan_ibu = $request['pendidikan_ibu'];
        $orangTua->penghasilan_ayah = $request['penghasilan_ayah'];
        $orangTua->penghasilan_ibu = $request['penghasilan_ibu'];
        $orangTua->nama_wali = $request['nama_wali'];
        $orangTua->alamat_wali = $request['alamat_wali'];
        $orangTua->no_wali = $request['no_wali'];
        $orangTua->pendidikan_wali = $request['pendidikan_wali'];
        $orangTua->pekerjaan_wali = $request['pekerjaan_wali'];
        $orangTua->penghasilan_wali = $request['penghasilan_wali'];
        $orangTua->save();

        return redirect()->route('pendaftaran.saya')->with('success', 'Pendaftaran berhasil disimpan.');
    }

    public function showMyData()
    {
        $pendaftaran = Pendaftaran::where('user_id', auth()->id())->orderByDesc('id')->first();
        $orangtua = null;
        if ($pendaftaran) {
            $orangtua = $pendaftaran->orangTua;
        }

        return view('pendaftar.pendaftaran_saya', compact('pendaftaran', 'orangtua'));
    }

    public function edit()
    {
        $pendaftaran = Pendaftaran::where('user_id', auth()->id())->orderByDesc('id')->first();
        
        $jenjang = JenjangSekolah::all();
        
        if (!$pendaftaran) {
            $orangtua = null;
            // return redirect()->route('daftar')->with('info', 'Anda belum mengisi pendaftaran.');
        }else
        {
            $orangtua = $pendaftaran->orangTua;
            
            $sudahDiAsesmen = Asesmen::where('pendaftaran_id', $pendaftaran->id)->exists();
            if ($sudahDiAsesmen) {
            return redirect()->route('pendaftaran.saya')->with('error', 'Data tidak dapat diedit karena sudah diasesmen.');
        }
        }


        return view('pendaftar.edit_pendaftaran', compact('pendaftaran', 'orangtua', 'jenjang'));
    }

    public function update(Request $request)
    {   
        $pendaftaran = Pendaftaran::where('id', $request->pendaftaran_id)->first();

        if (!$pendaftaran) {
            return redirect()->route('daftar');
        }
        $orangTua = $pendaftaran->orangTua;

        $sudahDiAsesmen = Asesmen::where('pendaftaran_id', $pendaftaran->id)->exists();
        if ($sudahDiAsesmen) {
            return redirect()->route('pendaftaran.saya')->with('warning', 'Data tidak dapat diubah karena sudah diasesmen.');
        }

        $pendaftaran->nama_lengkap = $request['nama_lengkap'];
        $pendaftaran->nomor_induk_asal = $request['nomor_induk_asal'];
        $pendaftaran->nisn = $request['nisn'];
        $pendaftaran->nik = $request['nik'];
        $pendaftaran->tempat_lahir = $request['tempat_lahir'];
        $pendaftaran->tanggal_lahir = $request['tanggal_lahir'];
        $pendaftaran->jenis_kelamin = $request['jenis_kelamin'];
        $pendaftaran->alamat = $request['alamat'];
        $pendaftaran->telepon_siswa = $request['telepon_siswa'];
        $pendaftaran->tamatan_dari = $request['tamatan_dari'];
        $pendaftaran->tgl_sttb = $request['tgl_sttb'];
        $pendaftaran->no_sttb = $request['no_sttb'];
        $pendaftaran->lama_belajar = $request['lama_belajar'];
        $pendaftaran->pindahan_dari = $request['pindahan_dari'];
        $pendaftaran->alasan = $request['alasan'];
        $pendaftaran->jenjang_sekolah_id = $request['jenjang_sekolah_id'];
         if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('uploads/dokumen', 'public_html');
            $pendaftaran->foto = $path;
        }
        $pendaftaran->save();
        $orangTua->nama_ayah = $request['nama_ayah'];
        $orangTua->nama_ibu = $request['nama_ibu'];
        $orangTua->alamat_ortu = $request['alamat_ortu'];
        $orangTua->no_ortu = $request['no_ortu'];
        $orangTua->pekerjaan_ayah = $request['pekerjaan_ayah'];
        $orangTua->pekerjaan_ibu = $request['pekerjaan_ibu'];
        $orangTua->pendidikan_ayah = $request['pendidikan_ayah'];
        $orangTua->pendidikan_ibu = $request['pendidikan_ibu'];
        $orangTua->penghasilan_ayah = $request['penghasilan_ayah'];
        $orangTua->penghasilan_ibu = $request['penghasilan_ibu'];
        $orangTua->nama_wali = $request['nama_wali'];
        $orangTua->alamat_wali = $request['alamat_wali'];
        $orangTua->no_wali = $request['no_wali'];
        $orangTua->pendidikan_wali = $request['pendidikan_wali'];
        $orangTua->pekerjaan_wali = $request['pekerjaan_wali'];
        $orangTua->penghasilan_wali = $request['penghasilan_wali'];
        $orangTua->save();
        
        return redirect()->route('pendaftaran.saya')->with('success', 'Data berhasil diperbarui.');
    }

    public function cetak()
    {
        $pendaftaran = Pendaftaran::where('user_id', auth()->id())->orderByDesc('id')->first();

        if (!$pendaftaran) {
            return redirect()->route('daftar')->with('info', 'Anda belum mengisi pendaftaran.');
        }

        $orangtua = $pendaftaran->orangTua;

        $pdf = Pdf::loadView('pendaftar.pendaftaran_pdf', compact('pendaftaran','orangtua'));
        return $pdf->download('formulir-pendaftaran-' . $pendaftaran->nama_lengkap . '.pdf');
        // return $pdf->stream('formulir-pendaftaran-' . $pendaftaran->nama_lengkap . '.pdf');
    }
}
