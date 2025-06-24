<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrangTua extends Model
{
    use HasFactory;

    protected $table = 'orang_tua';

    protected $fillable = [
        'pendaftaran_id',

        // Ayah
        'nama_ayah', 'umur_ayah', 'agama_ayah', 'status_ayah',
        'pendidikan_ayah', 'pekerjaan_ayah', 'alamat_ayah',

        // Ibu
        'nama_ibu', 'umur_ibu', 'agama_ibu', 'status_ibu',
        'pendidikan_ibu', 'pekerjaan_ibu', 'alamat_ibu',

        // Wali
        'nama_wali', 'umur_wali', 'agama_wali', 'status_perkawinan_wali',
        'pendidikan_wali', 'pekerjaan_wali', 'alamat_wali', 'hubungan_wali',
    ];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class);
    }
}
