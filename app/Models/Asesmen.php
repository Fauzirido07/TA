<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asesmen extends Model
{
    use HasFactory, SoftDeletes;

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
}
