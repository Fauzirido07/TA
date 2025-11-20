<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenjangSekolah extends Model
{
    protected $table = 'jenjang_sekolah';
    protected $fillable = ['jenjang'];

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'jenjang_sekolah_id');
    }
}
