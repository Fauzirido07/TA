<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\MasaBalita;
use App\Models\PerkembanganFisik;
use App\Models\PerkembanganBahasa;
use App\Models\PerkembanganSosial;
use App\Models\RiwayatPendidikan;
use App\Models\OrangTua;
use App\Models\DokumenPendaftaran;
use App\Models\Notifikasi;
use App\Models\Asesmen;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PendaftaranController extends Controller
{
    public function create()
    {
        $pendaftaran = Pendaftaran::where('user_id', auth()->id())->first();
        return view('pendaftaran', compact('pendaftaran'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            // Identitas Anak
            'nama_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'agama' => 'required|string|max:255',
            'anak_ke' => 'required|integer|min:1',
            'jumlah_saudara' => 'required|integer|min:1',
            'alamat' => 'required|string',

            // Dokumen
            'dokumen_pendukung' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',

            // Data lain validasi bisa ditambahkan jika perlu
        ]);

        // Simpan data pendaftaran utama (identitas anak)
        $pendaftaran = Pendaftaran::create([
            'user_id' => auth()->id(),
            'nama_lengkap' => $validated['nama_lengkap'],
            'tempat_lahir' => $validated['tempat_lahir'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'agama' => $validated['agama'],
            'anak_ke' => $validated['anak_ke'],
            'jumlah_saudara' => $validated['jumlah_saudara'],
            'alamat' => $validated['alamat'],
            'status' => 'pending',
        ]);

        // Simpan data ke masing-masing model berdasarkan request
        MasaBalita::create([
            'pendaftaran_id' => $pendaftaran->id,
            'asi_hingga' => $request->asi_hingga,
            'susu_tambahan_hingga' => $request->susu_tambahan_hingga,
            'imunisasi' => $request->imunisasi,
            'penimbangan_rutin' => $request->penimbangan_rutin,
            'kualitas_makanan' => $request->kualitas_makanan,
            'kuantitas_makan' => $request->kuantitas_makan,
            'kesulitan_makan' => $request->kesulitan_makan,
        ]);

        PerkembanganFisik::create([
            'pendaftaran_id' => $pendaftaran->id,
            'umur_berdiri' => $request->umur_berdiri,
            'umur_berjalan' => $request->umur_berjalan,
            'umur_sepeda_roda_tiga' => $request->umur_sepeda_roda_tiga,
            'umur_sepeda_roda_dua' => $request->umur_sepeda_roda_dua,
            'umur_bicara_kalimat' => $request->umur_bicara_kalimat,
            'kesulitan_gerak' => $request->kesulitan_gerak,
            'status_gizi' => $request->status_gizi,
            'riwayat_kesehatan' => $request->riwayat_kesehatan,
        ]);

        PerkembanganBahasa::create([
            'pendaftaran_id' => $pendaftaran->id,
            'umur_celoteh' => $request->umur_celoteh,
            'umur_suku_kata' => $request->umur_suku_kata,
            'umur_kata_bermakna' => $request->umur_kata_bermakna,
            'umur_kalimat_sederhana' => $request->umur_kalimat_sederhana,
        ]);

        PerkembanganSosial::create([
            'pendaftaran_id' => $pendaftaran->id,
            'hubungan_saudara' => $request->hubungan_saudara,
            'hubungan_teman' => $request->hubungan_teman,
            'hubungan_orangtua' => $request->hubungan_orangtua,
            'hobi' => $request->hobi,
        ]);

        RiwayatPendidikan::create([
            'pendaftaran_id' => $pendaftaran->id,
            'masuk_tk_umur' => $request->masuk_tk_umur,
            'lama_pendidikan_tk' => $request->lama_pendidikan_tk,
            'kesulitan_tk' => $request->kesulitan_tk,
            'masuk_sd_umur' => $request->masuk_sd_umur,
            'kesulitan_sd' => $request->kesulitan_sd,
            'pernah_tidak_naik' => $request->pernah_tidak_naik,
            'mapel_sulit' => $request->mapel_sulit,
            'mapel_disukai' => $request->mapel_disukai,
        ]);

        OrangTua::create([
            'pendaftaran_id' => $pendaftaran->id,
            'nama_ayah' => $request->nama_ayah,
            'umur_ayah' => $request->umur_ayah,
            'agama_ayah' => $request->agama_ayah,
            'status_ayah' => $request->status_ayah,
            'pendidikan_ayah' => $request->pendidikan_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'alamat_ayah' => $request->alamat_ayah,

            'nama_ibu' => $request->nama_ibu,
            'umur_ibu' => $request->umur_ibu,
            'agama_ibu' => $request->agama_ibu,
            'status_ibu' => $request->status_ibu,
            'pendidikan_ibu' => $request->pendidikan_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'alamat_ibu' => $request->alamat_ibu,

            'nama_wali' => $request->nama_wali,
            'umur_wali' => $request->umur_wali,
            'agama_wali' => $request->agama_wali,
            'status_perkawinan_wali' => $request->status_perkawinan_wali,
            'pendidikan_wali' => $request->pendidikan_wali,
            'pekerjaan_wali' => $request->pekerjaan_wali,
            'alamat_wali' => $request->alamat_wali,
            'hubungan_wali' => $request->hubungan_wali,
        ]);

        $path = $request->file('dokumen_pendukung')->store('dokumen', 'public');

        DokumenPendaftaran::create([
            'pendaftaran_id' => $pendaftaran->id,
            'file_path' => $path,
            'dokumen_pendukung' => $path,
        ]);


        // Notifikasi untuk semua staff
        $staffs = User::where('role', 'staff')->get();
        foreach ($staffs as $staff) {
            Notifikasi::create([
                'user_id' => $staff->id,
                'pesan' => 'Ada pendaftar baru: ' . $pendaftaran->nama_lengkap,
                'status' => 'belum dibaca',
            ]);
        }

        return redirect()->route('jadwal')->with('success', 'Pendaftaran berhasil dikirim!');
    }

    public function showMyData()
    {
        $pendaftaran = Pendaftaran::where('user_id', auth()->id())->first();

        if (!$pendaftaran) {
            return redirect()->route('daftar')->with('info', 'Anda belum mengisi formulir pendaftaran.');
        }

        return view('pendaftar.pendaftaran_saya', compact('pendaftaran'));
    }

    public function edit()
    {
        $pendaftaran = Pendaftaran::where('user_id', auth()->id())->first();

        if (!$pendaftaran) {
            return redirect()->route('daftar')->with('info', 'Anda belum mengisi pendaftaran.');
        }

        $sudahDiAsesmen = Asesmen::where('pendaftaran_id', $pendaftaran->id)->exists();
        if ($sudahDiAsesmen) {
            return redirect()->route('pendaftaran.saya')->with('warning', 'Data tidak dapat diedit karena sudah diasesmen.');
        }

        return view('pendaftar.edit_pendaftaran', compact('pendaftaran'));
    }

    public function update(Request $request)
    {
        $pendaftaran = Pendaftaran::where('user_id', auth()->id())->first();

        if (!$pendaftaran) {
            return redirect()->route('daftar');
        }

        $sudahDiAsesmen = Asesmen::where('pendaftaran_id', $pendaftaran->id)->exists();
        if ($sudahDiAsesmen) {
            return redirect()->route('pendaftaran.saya')->with('warning', 'Data tidak dapat diubah karena sudah diasesmen.');
        }

        $validated = $request->validate([
            // A. Identitas Anak
            'nama_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'agama' => 'required|string|max:255',
            'status_anak' => 'required|string|max:255',
            'anak_ke' => 'required|integer|min:1',
            'jumlah_saudara' => 'required|integer|min:1',
            'alamat' => 'required|string',

            // B. Riwayat Kelahiran
            'perkembangan_kehamilan' => 'required|string',
            'penyakit_kehamilan' => 'required|string',
            'usia_kandungan' => 'required|string',
            'proses_kelahiran' => 'required|string',
            'tempat_kelahiran' => 'required|string',
            'penolong_kelahiran' => 'required|string',
            'gangguan_lahir' => 'required|string',
            'berat_bayi' => 'required|integer|min:0',
            'panjang_bayi' => 'required|integer|min:0',
            'tanda_kelainan' => 'required|string',

            // C - G. Masa Balita, Fisik, Bahasa, Sosial, Pendidikan
            'asi_hingga' => 'required|integer|min:0',
            'susu_tambahan_hingga' => 'required|integer|min:0',
            'imunisasi' => 'required|in:lengkap,tidak',
            'penimbangan_rutin' => 'required|in:ya,tidak',
            'kualitas_makanan' => 'required|string',
            'kuantitas_makan' => 'required|string',
            'kesulitan_makan' => 'required|in:ya,tidak',

            'umur_berdiri' => 'required|integer|min:0',
            'umur_berjalan' => 'required|integer|min:0',
            'umur_sepeda_roda_tiga' => 'required|integer|min:0',
            'umur_sepeda_roda_dua' => 'required|integer|min:0',
            'umur_bicara_kalimat' => 'required|integer|min:0',
            'kesulitan_gerak' => 'required|string',
            'status_gizi' => 'required|in:baik,kurang',
            'riwayat_kesehatan' => 'required|in:baik,kurang',

            'umur_celoteh' => 'required|integer|min:0',
            'umur_suku_kata' => 'required|integer|min:0',
            'umur_kata_bermakna' => 'required|integer|min:0',
            'umur_kalimat_sederhana' => 'required|integer|min:0',

            'hubungan_saudara' => 'required|string',
            'hubungan_teman' => 'required|string',
            'hubungan_orangtua' => 'required|string',
            'hobi' => 'required|string',

            'masuk_tk_umur' => 'required|integer|min:0',
            'lama_pendidikan_tk' => 'required|integer|min:0',
            'kesulitan_tk' => 'required|string',
            'masuk_sd_umur' => 'required|integer|min:0',
            'kesulitan_sd' => 'required|string',
            'pernah_tidak_naik' => 'required|in:ya,tidak',
            'mapel_sulit' => 'required|string',
            'mapel_disukai' => 'required|string',

            // H. Data Orang Tua / Wali
            'nama_ayah' => 'required|string|max:255',
            'umur_ayah' => 'required|integer|min:0',
            'agama_ayah' => 'required|string|max:255',
            'status_ayah' => 'required|string|max:255',
            'pendidikan_ayah' => 'required|string|max:255',
            'pekerjaan_ayah' => 'required|string|max:255',
            'alamat_ayah' => 'required|string',

            'nama_ibu' => 'required|string|max:255',
            'umur_ibu' => 'required|integer|min:0',
            'agama_ibu' => 'required|string|max:255',
            'status_ibu' => 'required|string|max:255',
            'pendidikan_ibu' => 'required|string|max:255',
            'pekerjaan_ibu' => 'required|string|max:255',
            'alamat_ibu' => 'required|string',

            'nama_wali' => 'nullable|string|max:255',
            'umur_wali' => 'nullable|integer|min:0',
            'agama_wali' => 'nullable|string|max:255',
            'status_perkawinan_wali' => 'nullable|string|max:255',
            'pendidikan_wali' => 'nullable|string|max:255',
            'pekerjaan_wali' => 'nullable|string|max:255',
            'alamat_wali' => 'nullable|string',
            'hubungan_wali' => 'nullable|string|max:255',

            // Dokumen, optional
            'dokumen_pendukung' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('dokumen_pendukung')) {
            $path = $request->file('dokumen_pendukung')->store('dokumen', 'public');
            $validated['dokumen_pendukung'] = $path;
        }

        $pendaftaran->update($validated);

        return redirect()->route('pendaftaran.saya')->with('success', 'Data berhasil diperbarui.');
    }

    public function cetak()
    {
        $pendaftaran = Pendaftaran::where('user_id', auth()->id())->first();

        if (!$pendaftaran) {
            return redirect()->route('daftar')->with('info', 'Anda belum mengisi pendaftaran.');
        }

        $pdf = Pdf::loadView('pendaftar.pendaftaran_pdf', compact('pendaftaran'));
        return $pdf->download('formulir-pendaftaran-' . $pendaftaran->nama_lengkap . '.pdf');
    }
}
