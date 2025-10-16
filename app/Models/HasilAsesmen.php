<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilAsesmen extends Model
{
    use HasFactory;
    protected $table = 'hasil_asesmen';
    protected $fillable = ['asesmen_id', 'form_asesmen_id', 'jawaban'];

        public function formAsesmen()
    {

        return $this->belongsTo(formAsesmen::class);
    }

        public function asesmen()
    {

        return $this->belongsTo(Asesmen::class);
    }
}


