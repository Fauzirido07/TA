<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormAsesmen extends Model
{
    use HasFactory;
    protected $table = 'form_asesmen';
    protected $fillable = ['form_asesmen_header_id', 'question', 'question_type', 'order'];

    public function formAsesmenHeader()
    {

        return $this->belongsTo(formAsesmenHeader::class);
    }

}
