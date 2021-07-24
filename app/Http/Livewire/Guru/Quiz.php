<?php

namespace App\Http\Livewire\Guru;

use App\Models\Quiz as ModelsQuiz;
use Livewire\Component;
use Livewire\WithPagination;

class Quiz extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $tambah;
    public $nama;

    protected $rules = [
        'nama' => 'required',
    ];

    public function tambah()
    {
        $this->tambah = true;
    }

    public function simpan()
    {
        $this->validate();

        ModelsQuiz::create([
            'nama' => $this->nama
        ]);

        session()->flash('sukses', 'Data berhasil ditambahkan.');
        $this->format();
    }

    public function render()
    {
        $quiz = ModelsQuiz::paginate(5);
        return view('livewire.guru.quiz', compact('quiz'));
    }

    public function format()
    {
        $this->tambah = false;
        unset($this->nama);
    }
}
