<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JadwalAsesmen extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'jadwal_asesmen';
    protected $fillable = ['pendaftaran_id', 'tanggal', 'waktu', 'lokasi'];
    protected $casts = [
        'tanggal'=>'date'
    ];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class,"pendaftaran_id");
    }
}
