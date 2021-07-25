<?php

namespace App\Http\Livewire\Guru;

use App\Models\KelompokBelajar as ModelsKelompokBelajar;
use Livewire\Component;
use Livewire\WithPagination;

class KelompokBelajar extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $tambah;
    public $nama;

    protected function rules()
    {
        return [
            'nama' => 'required',
        ];
    }

    public function tambah()
    {
        $this->tambah = true;
    }

    public function simpan()
    {
        $this->validate();

        ModelsKelompokBelajar::create([
            'nama' => $this->nama
        ]);

        session()->flash('sukses', 'Data berhasil ditambahkan.');
        $this->format();
    }

    public function render()
    {
        $kelompok_belajar = ModelsKelompokBelajar::paginate(1);
        return view('livewire.guru.kelompok-belajar', compact('kelompok_belajar'));
    }

    public function format()
    {
        $this->tambah = false;

        unset($this->nama);
    }
}
