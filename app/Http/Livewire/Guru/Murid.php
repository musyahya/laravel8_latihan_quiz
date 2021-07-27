<?php

namespace App\Http\Livewire\Guru;

use App\Models\Quiz;
use App\Models\User;
use Livewire\Component;

class Murid extends Component
{
    public $tambah;
    public $murid;

    protected function rules()
    {
        return [
            'murid' => 'required',
        ];
    }

    public function tambah()
    {
        $this->tambah = true;
    }

    public function simpan()
    {
        $this->validate();

        $quiz = Quiz::find(session('quiz_id'));
        $quiz->murid()->attach($this->murid);

        session()->flash('sukses', 'Data berhasil ditambahkan.');
        $this->format();
    }

    public function render()
    {
        if ($this->tambah) {
            $murid_all = User::role('murid')->get();
        } else {
            $murid_all = null;
        }
        $quiz = Quiz::find(session('quiz_id'));
        $murid_quiz = $quiz->murid;
        return view('livewire.guru.murid', compact('murid_quiz', 'murid_all'));
    }

    public function format()
    {
        $this->tambah = false;

        unset($this->murid);
    }
}
