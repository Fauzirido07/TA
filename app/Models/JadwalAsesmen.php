<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalAsesmen extends Model
{
    use HasFactory;

    protected $table = 'jadwal_asesmen';
    protected $fillable = ['tanggal', 'waktu', 'lokasi'];
}
