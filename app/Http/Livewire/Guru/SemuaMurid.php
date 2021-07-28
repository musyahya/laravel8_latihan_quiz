<?php

namespace App\Http\Livewire\Guru;

use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;
use Livewire\WithPagination;

class SemuaMurid extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $tambah;
    public $nama, $email, $password, $password_confirmation;

    protected function rules()
    {
        return [
            'nama' => 'required',
            'email' => ['required', 'email', 'unique:App\Models\User,email'],
            'password' => ['required', Password::min(8), 'confirmed'],
            'password_confirmation' => ['required', Password::min(8)]
        ];
    }

    protected $validationAttributes = [
        'password_confirmation' => 'Ulangi Password'
    ];

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

        User::create([
            'name' => $this->nama,
            'email' => $this->email,
            'password' => bcrypt($this->password)
        ])->assignRole('murid');

        session()->flash('sukses', 'Data berhasil disimpan.');
        $this->format();
    }

    public function render()
    {
        $murid = User::role('murid')->paginate(5);
        return view('livewire.guru.semua-murid', compact('murid'));
    }

    public function format()
    {
        $this->tambah = false;

        unset($this->nama);
        unset($this->email);
        unset($this->password);
        unset($this->password_confirmation);
    }
}
