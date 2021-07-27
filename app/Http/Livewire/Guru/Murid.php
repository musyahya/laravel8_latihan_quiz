<?php

namespace App\Http\Livewire\Guru;

use App\Models\Quiz;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Murid extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $tambah, $edit, $hapus, $search;
    public $murid, $murid_id;

    protected function rules()
    {
        return [
            'murid' => 'required',
        ];
    }

    public function updatingSearch()
    {
        $this->resetPage();
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

    public function hapus($id)
    {
        $this->hapus = true;
        $this->murid_id = $id;
    }

    public function delete($id)
    {
        $quiz = Quiz::find(session('quiz_id'));
        $quiz->murid()->detach($id);

        $this->updatingSearch();
        session()->flash('sukses', 'Data berhasil dihapus.');
        $this->format();
    }

    public function render()
    {
        $quiz = Quiz::find(session('quiz_id'));
        $murid_quiz = $quiz->murid()->paginate(1);

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

        // if ($this->search) {
        //     $murid_quiz = $murid_quiz->contains(function($item){
        //         return $item->name = $this->search;
        //     });
        //     dd($murid_quiz);
        // }

        return view('livewire.guru.murid', compact('murid_quiz', 'murid_all'));
    }

    public function format()
    {
        $this->tambah = false;
        $this->edit = false;
        $this->hapus = false;

        unset($this->murid);
        unset($this->murid_id);
    }
}
