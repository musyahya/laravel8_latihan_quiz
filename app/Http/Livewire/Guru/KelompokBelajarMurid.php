<?php

namespace App\Http\Livewire\Guru;

use App\Models\KelompokBelajar;
use App\Models\User;
use Livewire\Component;

class KelompokBelajarMurid extends Component
{
    public $tambah, $edit, $hapus;
    public $murid, $murid_id;

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

        $kelompok_belajar = KelompokBelajar::find(session('pilih_kelompok_belajar'));
        $kelompok_belajar->user()->attach($this->murid);

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

        $kelompok_belajar = KelompokBelajar::find(session('pilih_kelompok_belajar'));
        $kelompok_belajar->user()->sync($this->murid);

        session()->flash('sukses', 'Data berhasil diubah.');
        $this->format();
    }

    public function hapus(User $user)
    {
        $this->hapus = true;
        $this->murid_id = $user->id;
    }

    public function delete(User $user)
    {
        $kelompok_belajar = KelompokBelajar::find(session('pilih_kelompok_belajar'));
        $kelompok_belajar->user()->detach($user->id);

        session()->flash('sukses', 'Data berhasil dihapus.');
        $this->format();
    }

    public function render()
    {
        if ($this->tambah) {
            $murid_all = User::role('murid')->get();
        } elseif ($this->edit) {
            $murid_all = User::role('murid')->get();
            $kelompok_belajar = KelompokBelajar::find(session('pilih_kelompok_belajar'));
            $kelompok_belajar = $kelompok_belajar->user;
            $kelompok_belajar = $kelompok_belajar->map(function ($item) {
                return $item->id;
            });
            $this->murid = $kelompok_belajar;
        } else {
            $murid_all = false;
        }

        $kelompok_belajar_murid = KelompokBelajar::whereId(session('pilih_kelompok_belajar'))->first();
        return view('livewire.guru.kelompok-belajar-murid', compact('kelompok_belajar_murid', 'murid_all'));
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
