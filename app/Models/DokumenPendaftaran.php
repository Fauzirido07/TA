<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenPendaftaran extends Model
{
    use HasFactory;

    protected $table = 'dokumen_pendaftaran';

    protected $fillable = [
        'pendaftaran_id',
        'dokumen_pendukung',
        'status',
    ];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class);
    }
}
