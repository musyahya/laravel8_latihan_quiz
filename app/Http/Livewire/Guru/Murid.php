<?php

namespace App\Http\Livewire\Guru;

use App\Models\Quiz;
use Livewire\Component;

class Murid extends Component
{
    public $tambah;

    public function render()
    {
        $quiz = Quiz::find(session('quiz_id'));
        $murid = $quiz->murid;
        return view('livewire.guru.murid', compact('murid'));
    }
}
