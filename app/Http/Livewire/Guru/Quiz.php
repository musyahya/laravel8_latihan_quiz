<?php

namespace App\Http\Livewire\Guru;

use App\Models\Quiz as ModelsQuiz;
use Livewire\Component;
use Livewire\WithPagination;

class Quiz extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $tambah, $edit;
    public $nama, $quiz_id;

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

    public function edit(ModelsQuiz $quiz)
    {
        $this->edit = true;

        $this->nama = $quiz->nama;
        $this->quiz_id = $quiz->id;
    }

    public function update()
    {
        $this->validate();

        ModelsQuiz::whereId($this->quiz_id)->update([
            'nama' => $this->nama
        ]);

        session()->flash('sukses', 'Data berhasil diubah.');
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
        $this->edit = false;
        unset($this->nama);
        unset($this->quiz_id);
    }
}
