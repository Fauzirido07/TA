<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran'; // pastikan nama tabel sesuai di database

    protected $fillable = [
        'user_id',

        // A. Identitas Anak
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'status_anak',
        'anak_ke',
        'jumlah_saudara',
        'alamat',

        // B. Riwayat Kelahiran
        'perkembangan_kehamilan',
        'penyakit_kehamilan',
        'usia_kandungan',
        'proses_kelahiran',
        'tempat_kelahiran',
        'penolong_kelahiran',
        'gangguan_lahir',
        'berat_bayi',
        'panjang_bayi',
        'tanda_kelainan',

        // C - G. Masa Balita, Fisik, Bahasa, Sosial, Pendidikan
        'asi_hingga',
        'susu_tambahan_hingga',
        'imunisasi',
        'penimbangan_rutin',
        'kualitas_makanan',
        'kuantitas_makan',
        'kesulitan_makan',

        'umur_berdiri',
        'umur_berjalan',
        'umur_sepeda_roda_tiga',
        'umur_sepeda_roda_dua',
        'umur_bicara_kalimat',
        'kesulitan_gerak',
        'status_gizi',
        'riwayat_kesehatan',

        'umur_celoteh',
        'umur_suku_kata',
        'umur_kata_bermakna',
        'umur_kalimat_sederhana',

        'hubungan_saudara',
        'hubungan_teman',
        'hubungan_orangtua',
        'hobi',

        'masuk_tk_umur',
        'lama_pendidikan_tk',
        'kesulitan_tk',
        'masuk_sd_umur',
        'kesulitan_sd',
        'pernah_tidak_naik',
        'mapel_sulit',
        'mapel_disukai',

        // H. Data Orang Tua / Wali
        'nama_ayah',
        'umur_ayah',
        'agama_ayah',
        'status_ayah',
        'pendidikan_ayah',
        'pekerjaan_ayah',
        'alamat_ayah',

        'nama_ibu',
        'umur_ibu',
        'agama_ibu',
        'status_ibu',
        'pendidikan_ibu',
        'pekerjaan_ibu',
        'alamat_ibu',

        'nama_wali',
        'umur_wali',
        'agama_wali',
        'status_perkawinan_wali',
        'pendidikan_wali',
        'pekerjaan_wali',
        'alamat_wali',
        'hubungan_wali',

        // Dokumen & status
        'dokumen_pendukung',
        'status',
    ];

    // Jika menggunakan timestamps di tabel
    public $timestamps = true;

    // Relasi ke user (pendaftar)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke asesmen (jika ada)
    public function asesmen()
    {
        return $this->hasOne(Asesmen::class);
    }
}
