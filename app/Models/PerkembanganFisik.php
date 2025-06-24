<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerkembanganFisik extends Model
{
    use HasFactory;

    protected $table = 'perkembangan_fisik';

    protected $fillable = [
        'pendaftaran_id',
        'umur_berdiri',
        'umur_berjalan',
        'umur_sepeda_roda_tiga',
        'umur_sepeda_roda_dua',
        'umur_bicara_kalimat',
        'kesulitan_gerak',
        'status_gizi',
        'riwayat_kesehatan',
    ];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class);
    }
}
