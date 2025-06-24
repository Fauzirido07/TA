<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran';

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
    ];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function masaBalita()
    {
        return $this->hasOne(MasaBalita::class);
    }

    public function perkembanganFisik()
    {
        return $this->hasOne(PerkembanganFisik::class);
    }

    public function perkembanganBahasa()
    {
        return $this->hasOne(PerkembanganBahasa::class);
    }

    public function perkembanganSosial()
    {
        return $this->hasOne(PerkembanganSosial::class);
    }

    public function pendidikan()
    {
        return $this->hasOne(RiwayatPendidikan::class);
    }

    public function orangTua()
    {
        return $this->hasOne(OrangTua::class);
    }

    public function dokumen()
    {
        return $this->hasOne(DokumenPendaftaran::class);
    }

        public function asesmen()
    {
        return $this->hasOne(Asesmen::class);
    }

}
