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

    public $tambah;
    public $soal, $pilihan_a, $pilihan_b, $pilihan_c, $pilihan_d, $pilihan_e, $jawaban;

    protected function rules()
    {
        return [
            'soal' => 'required',
            'pilihan_a' => 'required',
            'pilihan_b' => 'required',
            'pilihan_c' => 'required',
            'pilihan_d' => 'required',
            'pilihan_e' => 'required',
            'jawaban' => ['required', Rule::in(['pilihan_a', 'pilihan_b', 'pilihan_c', 'pilihan_d', 'pilihan_eeb']),],
        ];
    }

    public function tambah()
    {
        $this->tambah = true;
    }
    
    public function simpan()
    {
        $this->validate();

        ModelsSoal::create([
            'soal' => $this->soal,
            'pilihan_a' => $this->pilihan_a,
            'pilihan_b' => $this->pilihan_b,
            'pilihan_c' => $this->pilihan_c,
            'pilihan_d' => $this->pilihan_d,
            'pilihan_e' => $this->pilihan_e,
            'jawaban' => $this->jawaban,
            'quiz_id' => session('quiz_id')
        ]);

        session()->flash('sukses', 'Data berhasil ditambahkan.');
        $this->format();
    }

    public function render()
    {
        if (session('first_tambah')) {
            $this->tambah = true;
        }
        $soal_quiz = ModelsSoal::where('quiz_id', session('quiz_id'))->paginate(1);
        return view('livewire.guru.soal', compact('soal_quiz'));
    }

    public function format()
    {
        $this->tambah = false;

        unset($this->soal);
        unset($this->pilihan_a);
        unset($this->pilihan_b);
        unset($this->pilihan_c);
        unset($this->pilihan_d);
        unset($this->pilihan_e);
    }
}
