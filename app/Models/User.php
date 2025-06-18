<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;

    // Kolom yang bisa diisi
    protected $fillable = [
        'nama', 'email', 'password', 'role',
    ];

    // Relasi
    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class);
    }

    public function asesmen()
    {
        return $this->hasMany(Asesmen::class, 'guru_id');
    }

    public function evaluasi()
    {
        return $this->hasMany(Evaluasi::class, 'guru_id');
    }

    public function notifikasi()
    {
        return $this->hasMany(Notifikasi::class);
    }
}
    