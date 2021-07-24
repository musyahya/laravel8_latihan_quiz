<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    
    protected $table = 'quiz';
    protected $fillable = ['soal', 'pilihan_a', 'pilihan_b', 'pilihan_c', 'pilihan_d', 'pilihan_e', 'jawaban'];

    public function soal()
    {
        return $this->hasMany(Soal::class);
    }
}
