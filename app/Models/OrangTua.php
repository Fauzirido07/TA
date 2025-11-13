<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrangTua extends Model
{
    use HasFactory;

    protected $table = 'orang_tua';

    protected $fillable = [
        'pendaftaran_id',
        'nama_ayah','nama_ibu','alamat_ortu','no_ortu','pekerjaan_ayah','pekerjaan_ibu','pendidikan_ayah','pendidikan_ibu',
        'penghasilan_ayah','penghasilan_ibu',
        'nama_wali', 'alamat_wali', 'no_wali','pendidikan_wali', 'pekerjaan_wali', 'penghasilan_wali',
    ];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class);
    }
}
