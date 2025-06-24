<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerkembanganSosial extends Model
{
    use HasFactory;

    protected $table = 'perkembangan_sosial';

    protected $fillable = [
        'pendaftaran_id',
        'hubungan_saudara',
        'hubungan_teman',
        'hubungan_orangtua',
        'hobi',
    ];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class);
    }
}
