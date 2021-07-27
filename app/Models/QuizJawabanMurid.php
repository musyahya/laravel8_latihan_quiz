<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizJawabanMurid extends Model
{
    use HasFactory;
    protected $table = 'quiz_jawaban_murid';

    public function soal()
    {
        return $this->belongsTo(Soal::class, 'soal_id');
    }
}
