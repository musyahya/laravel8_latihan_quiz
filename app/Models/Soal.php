<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;

    protected $table = 'soal';
    protected $fillable = ['nama'];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
