<?php

namespace App\Http\Livewire\Guru;

use App\Models\KelompokBelajar as ModelsKelompokBelajar;
use Livewire\Component;
use Livewire\WithPagination;

class KelompokBelajar extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $tambah, $edit;
    public $nama, $kelompok_belajar_id;

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

    public function edit(ModelsKelompokBelajar $kelompok_belajar)
    {
        $this->edit = true;
        $this->kelompok_belajar_id = $kelompok_belajar->id;
        $this->nama = $kelompok_belajar->nama;
    }
    
    public function update(ModelsKelompokBelajar $kelompokBelajar)
    {
        $kelompokBelajar->update([
            'nama' => $this->nama
        ]);

        session()->flash('sukses', 'Data berhasil diubah.');
        $this->format();
    }

    public function render()
    {
        $kelompok_belajar = ModelsKelompokBelajar::paginate(5);
        return view('livewire.guru.kelompok-belajar', compact('kelompok_belajar'));
    }

    public function format()
    {
        $this->tambah = false;
        $this->edit = false;

        unset($this->nama);
        unset($this->kelompok_belajar_id);
    }
}
