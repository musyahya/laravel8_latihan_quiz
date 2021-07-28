<?php

namespace App\Http\Livewire\Guru;

use App\Models\Soal as ModelsSoal;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class Soal extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $hapus, $search;
    public  $soal_id;

    protected function rules()
    {
        return [
            'soal' => 'required',
            'pilihan_a' => 'required',
            'pilihan_b' => 'required',
            'pilihan_c' => 'required',
            'pilihan_d' => 'required',
            'pilihan_e' => 'required',
            'jawaban' => ['required', Rule::in(['pilihan_a', 'pilihan_b', 'pilihan_c', 'pilihan_d', 'pilihan_e']),],
        ];
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete(ModelsSoal $soal)
    {
        $soal->delete();

        session()->flash('sukses', 'Data berhasil dihapus.');
        $this->format();
        $this->updatingSearch();
    }

    public function update(ModelsSoal $soal)
    {
        $this->validate();

        $soal->update([
            'soal' => $this->soal,
            'pilihan_a' => $this->pilihan_a,
            'pilihan_b' => $this->pilihan_b,
            'pilihan_c' => $this->pilihan_c,
            'pilihan_d' => $this->pilihan_d,
            'pilihan_e' => $this->pilihan_e,
            'jawaban' => $this->jawaban,
            'quiz_id' => session('quiz_id')
        ]);

        session()->flash('sukses', 'Data berhasil diubah.');
        $this->format();
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
