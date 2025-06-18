<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'nama', 'status', 'email', 'no_hp',
    ];

    public function jadwalAsesmen()
    {
        return $this->hasOne(JadwalAsesmen::class, 'pendaftar_id');
    }
}
