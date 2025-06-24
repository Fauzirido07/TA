<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasaBalita extends Model
{
    use HasFactory;

    protected $table = 'masa_balita';

    protected $fillable = [
        'pendaftaran_id',
        'asi_hingga',
        'susu_tambahan_hingga',
        'imunisasi',
        'penimbangan_rutin',
        'kualitas_makanan',
        'kuantitas_makan',
        'kesulitan_makan',
    ];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class);
    }
}