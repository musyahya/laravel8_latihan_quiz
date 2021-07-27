<?php

namespace App\Http\Livewire\Murid;

use App\Models\Quiz as ModelsQuiz;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Quiz extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $soal;

    public function soal($id)
    {
        $cek = DB::table('quiz_murid')
            ->select('status')
            ->where('quiz_id', session('quiz_id'))
            ->where('murid_id', auth()->id())
            ->first();
        if ($cek->status == 1) {
            session()->flash('gagal', 'Quiz sudah pernah dikerjakan.');
            redirect('/quiz/murid');
        }else {
            session(['quiz_id' => $id]);
            redirect('/soal');
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $quiz = DB::table('quiz_murid')
            ->join('quiz', 'quiz_murid.quiz_id', '=', 'quiz.id')
            ->where('murid_id', auth()->id())
            ->select('quiz.nama', 'quiz_murid.*')
            ->paginate(5);

        return view('livewire.murid.quiz', compact('quiz'));
    }
}
