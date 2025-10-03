<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormAsesmen extends Model
{
    use HasFactory;
    protected $table = 'form_asesmen';

    public function formAsesmenHeader()
    {

        return $this->belongsTo(formAsesmenHeader::class);
    }

}
