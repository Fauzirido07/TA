<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluasi extends Model
{
    use HasFactory;

    protected $fillable = ['asesmen_id', 'guru_id', 'catatan', 'hasil'];

    public function asesmen()
    {
        return $this->belongsTo(Asesmen::class);
    }

    public function guru()
    {
        return $this->belongsTo(User::class, 'guru_id');
    }
}
