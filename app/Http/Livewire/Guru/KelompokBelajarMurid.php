<?php

namespace App\Http\Livewire\Guru;

use App\Models\KelompokBelajar;
use App\Models\Quiz;
use Livewire\Component;

class KelompokBelajarMurid extends Component
{

    public function render()
    {
        // $quiz = Quiz::all();
        // dd($quiz);
        // dd($quiz->soal);
        // dd($quiz->soal[0]->id);
        $kelompok_belajar_murid = KelompokBelajar::whereId(session('pilih_kelompok_belajar'))->first();
        // dd($kelompok_belajar_murid);
        // dd($kelompok_belajar_murid->user());
        // dd($kelompok_belajar_murid->user);
        // dd($kelompok_belajar_murid->user[0]);
        return view('livewire.guru.kelompok-belajar-murid', compact('kelompok_belajar_murid'));
    }
}
