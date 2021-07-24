<?php

namespace App\Http\Livewire\Guru;

use App\Models\Quiz as ModelsQuiz;
use Livewire\Component;
use Livewire\WithPagination;

class Quiz extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $tambah, $edit, $hapus;
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

        $quiz = ModelsQuiz::create([
            'nama' => $this->nama
        ]);

        session()->flash('first_tambah');
        $this->format();

        session(['quiz_id' => $quiz->id]);
        redirect('/soal');
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

    public function hapus(ModelsQuiz $quiz)
    {
        $this->hapus = true;

        $this->quiz_id = $quiz->id;
    }

    public function lihat_soal($id)
    {
        session(['quiz_id' => $id]);
        redirect('/soal');
    }

    public function delete(ModelsQuiz $quiz)
    {
        $quiz->delete();

        session()->flash('sukses', 'Data berhasil dihapus.');
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
        $this->hapus = false;

        $this->tambah_soal = false;

        unset($this->jumlah);
        unset($this->nama);
        unset($this->quiz_id);
    }
}