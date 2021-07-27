<?php

namespace App\Http\Livewire\Murid;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Quiz extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $soal;

    public function soal($id)
    {
        session(['quiz_id' => $id]);
        redirect('/soal');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $user = User::find(auth()->id());
        $quiz = $user->quiz()->paginate(1);
        return view('livewire.murid.quiz', compact('quiz'));
    }
}
