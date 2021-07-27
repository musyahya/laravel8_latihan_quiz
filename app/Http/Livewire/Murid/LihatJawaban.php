<?php

namespace App\Http\Livewire\Murid;

use App\Models\Quiz;
use Livewire\Component;
use Livewire\WithPagination;

class LihatJawaban extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $quiz = Quiz::find(session('quiz_id'));
        $soal = $quiz->soal()->paginate(1);
        return view('livewire.murid.lihat-jawaban', compact('soal'));
    }
}
