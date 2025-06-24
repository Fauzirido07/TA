<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerkembanganBahasa extends Model
{
    use HasFactory;

    protected $table = 'perkembangan_bahasa';

    protected $fillable = [
        'pendaftaran_id',
        'umur_celoteh',
        'umur_suku_kata',
        'umur_kata_bermakna',
        'umur_kalimat_sederhana',
    ];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class);
    }
}
