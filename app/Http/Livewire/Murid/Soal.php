<?php

namespace App\Http\Livewire\Murid;

use App\Models\Quiz;
use Livewire\Component;
use Livewire\WithPagination;

class Soal extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $pilih;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $quiz = Quiz::find(session('quiz_id'));
        $soal = $quiz->soal;
        foreach ($soal as $key => $value) {
            $this->pilih[$key] = '';
        }
    }

    public function pilih($pilihan, $page)
    {
        $this->pilih[$page - 1] = $pilihan;
    }

    public function selesai()
    {
        dd($this->pilih);
    }

    public function render()
    {
        $quiz = Quiz::find(session('quiz_id'));
        $soal = $quiz->soal()->paginate(1);
        return view('livewire.murid.soal', compact('soal'));
    }
}
