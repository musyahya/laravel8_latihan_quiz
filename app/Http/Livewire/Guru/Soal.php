<?php

namespace App\Http\Livewire\Guru;

use App\Models\Soal as ModelsSoal;
use Livewire\Component;
use Livewire\WithPagination;

class Soal extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['kirim_id_quiz'];

    public $quiz_id;

    public function kirim_id_quiz($quiz_id)
    {
        $this->quiz_id = $quiz_id;
    }

    public function render()
    {
        $soal = ModelsSoal::where('quiz_id', session('quiz_id'))->paginate(1);
        return view('livewire.guru.soal', compact('soal'));
    }
}
