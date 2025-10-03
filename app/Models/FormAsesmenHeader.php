<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormAsesmenHeader extends Model
{
    use HasFactory;
    protected $table = 'form_asesmen_header';

    public function formAsesmen()
    {

        return $this->hasMany(formAsesmen::class);
    }
}
