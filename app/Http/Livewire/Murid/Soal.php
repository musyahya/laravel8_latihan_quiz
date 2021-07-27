<?php

namespace App\Http\Livewire\Murid;

use App\Models\Quiz;
use Livewire\Component;
use Livewire\WithPagination;

class Soal extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $jawab;

    public function jawab($pilihan)
    {
        $this->jawab = $pilihan;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $quiz = Quiz::find(session('quiz_id'));
        $soal = $quiz->soal()->paginate(1);
        return view('livewire.murid.soal', compact('soal'));
    }
}
