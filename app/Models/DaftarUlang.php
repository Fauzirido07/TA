<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DaftarUlang extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'daftar_ulang';

    protected $fillable = [
        'pendaftaran_id',
        'akta_path',
        'kk_path',
        'ktp_path',
        'st_path',
        'form_path',
        'bukti_path'
    ];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class);
    }
}