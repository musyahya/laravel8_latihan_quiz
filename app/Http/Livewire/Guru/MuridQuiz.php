<?php

namespace App\Http\Livewire\Guru;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class MuridQuiz extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $murid = User::find(session('murid_id'));
        $quiz = DB::table('quiz_murid')
            ->join('quiz', 'quiz_murid.quiz_id', '=', 'quiz.id')
            ->where('quiz_murid.murid_id', session('murid_id'))
            ->select('quiz_murid.*', 'quiz.nama')
            ->paginate(5);

        return view('livewire.guru.murid-quiz', compact('quiz'));
    }
}
