<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelompokBelajar extends Model
{
    use HasFactory;

    protected $table = 'kelompok_belajar';
    protected $fillable = ['nama'];

    public function user()
    {
        return $this->belongsToMany(User::class, 'kelompok_belajar_user', 'kelompok_belajar_id', 'user_id');
    }
}
