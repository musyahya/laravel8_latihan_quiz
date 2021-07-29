<?php

namespace App\Http\Livewire\Murid;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Quiz extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;
    // public $soal, $search;

    public function soal($id)
    {
        $cek = DB::table('quiz_murid')
            ->select('status')
            ->where('quiz_id', $id)
            ->where('murid_id', auth()->id())
            ->first();

        if ($cek->status == 0) {
            session(['quiz_id' => $id]);
            redirect('/soal/murid');
        }else {
            session()->flash('gagal', 'Quiz sudah pernah dikerjakan.');
            redirect('/quiz/murid');
        }
    }

    public function lihat_jawaban($id)
    {
        session(['quiz_id' => $id]);
        redirect('/lihat_jawaban');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        if ($this->search) {
            $quiz = DB::table('quiz_murid')
                ->join('quiz', 'quiz_murid.quiz_id', '=', 'quiz.id')
                ->where('murid_id', auth()->id())
                ->where('quiz.nama', 'like', '%'. $this->search .'%')
                ->where('quiz.status', '1')
                ->select('quiz.nama', 'quiz_murid.*')
                ->paginate(5);
        } else {
            $quiz = DB::table('quiz_murid')
                ->join('quiz', 'quiz_murid.quiz_id', '=', 'quiz.id')
                ->where('murid_id', auth()->id())
                ->where('quiz.status', '1')
                ->select('quiz.nama', 'quiz_murid.*')
                ->paginate(5);
        }

        return view('livewire.murid.quiz', compact('quiz'));
    }
}
