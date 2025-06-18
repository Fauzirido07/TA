<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProsedurPendaftaran extends Model
{
    use HasFactory;

    protected $table = 'prosedur_pendaftaran';
    protected $fillable = ['deskripsi'];
}