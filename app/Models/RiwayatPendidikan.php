<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPendidikan extends Model
{
    use HasFactory;

    protected $table = 'riwayat_pendidikan';

    protected $fillable = [
        'pendaftaran_id',
        'masuk_tk_umur',
        'lama_pendidikan_tk',
        'kesulitan_tk',
        'masuk_sd_umur',
        'kesulitan_sd',
        'pernah_tidak_naik',
        'mapel_sulit',
        'mapel_disukai',
    ];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class);
    }
}
