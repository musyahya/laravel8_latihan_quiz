<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;

    protected $table = 'soal';
    protected $fillable = ['soal', 'pilihan_a', 'pilihan_b', 'pilihan_c', 'pilihan_d', 'pilihan_e', 'jawaban', 'quiz_id'];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
    
    public function murid()
    {
        return $this->belongsToMany(User::class, 'quiz_jawaban_murid', 'soal_id', 'murid_id');
    }
}
