<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    
    protected $table = 'quiz';
    protected $fillable = ['nama', 'status'];

    public function soal()
    {
        return $this->hasMany(Soal::class);
    }

    public function murid()
    {
        return $this->belongsToMany(User::class, 'quiz_murid', 'quiz_id', 'murid_id');
    }
}
