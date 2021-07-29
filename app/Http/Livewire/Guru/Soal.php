<?php

namespace App\Http\Livewire\Guru;

use App\Models\Soal as ModelsSoal;
use Livewire\Component;
use Livewire\WithPagination;

class Soal extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $hapus, $search;
    public  $soal_id;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function hapus($id)
    {
        $this->hapus = true;
        $this->soal_id = $id;
    }

    public function delete(ModelsSoal $soal)
    {
        $soal->delete();

        session()->flash('sukses', 'Data berhasil dihapus.');
        $this->format();
        $this->updatingSearch();
    }

    public function render()
    {
        if (session('first_tambah')) {
            $this->tambah = true;
        }

        if ($this->search) {
            $soal_quiz = ModelsSoal::where('quiz_id', session('quiz_id'))->where('soal', 'like', '%'. $this->search .'%')->paginate(1);
        } else {
            $soal_quiz = ModelsSoal::where('quiz_id', session('quiz_id'))->paginate(1);
        }
        
        return view('livewire.guru.soal', compact('soal_quiz'));
    }

    public function format()
    {
        $this->hapus = false;
        unset($this->soal_id);
    }
}
