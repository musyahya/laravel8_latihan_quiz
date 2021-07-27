<?php

namespace App\Http\Livewire\Murid;

use App\Models\User;
use Livewire\Component;

class Quiz extends Component
{
    public function render()
    {
        $user = User::find(auth()->id());
        $quiz = $user->quiz;
        return view('livewire.murid.quiz', compact('quiz'));
    }
}
