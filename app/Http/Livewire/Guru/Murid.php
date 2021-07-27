<?php

namespace App\Http\Livewire\Guru;

use App\Models\Quiz;
use App\Models\User;
use Livewire\Component;

class Murid extends Component
{
    public $tambah, $edit;
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

    public function edit()
    {
        $this->edit = true;
    }

    public function update()
    {
        $this->validate();
        
        $quiz = Quiz::find(session('quiz_id'));
        $quiz->murid()->sync($this->murid);

        session()->flash('sukses', 'Data berhasil diubah.');
        $this->format();
    }

    public function render()
    {
        $quiz = Quiz::find(session('quiz_id'));
        $murid_quiz = $quiz->murid;
        if ($this->tambah) {
            $murid_all = User::role('murid')->get();
        }elseif ($this->edit) {
            $murid_all = User::role('murid')->get();
            $this->murid = $murid_quiz->map(function($item){
                return $item->id;
            });
            $this->murid = $this->murid;
        } else {
            $murid_all = null;
        }
        return view('livewire.guru.murid', compact('murid_quiz', 'murid_all'));
    }

    public function format()
    {
        $this->tambah = false;
        $this->edit = false;

        unset($this->murid);
    }
}
