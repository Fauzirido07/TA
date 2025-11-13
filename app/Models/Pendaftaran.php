<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran';

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'nomor_induk_asal',
        'nisn',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'telepon_siswa',
        'tamatan_dari',
        'tgl_sttb',
        'no_sttb',
        'lama_belajar',
        'pindahan_dari',
        'alasan',
        'foto',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function orangTua()
    {
        return $this->hasOne(OrangTua::class);
    }

        public function asesmen()
    {
        return $this->hasOne(Asesmen::class);
    }

}
