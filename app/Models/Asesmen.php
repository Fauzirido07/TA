<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asesmen extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dengan nama default (plural)
    protected $table = 'asesmen';

    protected $fillable = ['pendaftaran_id', 'guru_id', 'hasil_asesmen', 'rekomendasi', 'skor'];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class);
    }

    public function guru()
    {
        return $this->belongsTo(User::class, 'guru_id');
    }

    public function evaluasi()
    {
        return $this->hasOne(Evaluasi::class);
    }
}
