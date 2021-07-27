<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function kelompok_belajar()
    {
        return $this->belongsToMany(KelompokBelajar::class, 'kelompok_belajar_user', 'user_id', 'kelompok_belajar_id');
    }

    public function quiz()
    {
        return $this->belongsToMany(Quiz::class, 'quiz_murid', 'murid_id', 'quiz_id');
    }

    public function quizGuru()
    {
        return $this->hasMany(Quiz::class, 'guru_id');
    }

    public function soal()
    {
        return $this->belongsToMany(Soal::class, 'quiz_jawaban_murid', 'murid_id', 'soal_id');
    }
}
