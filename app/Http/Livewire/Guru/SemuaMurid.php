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

    public $tambah, $edit, $hapus, $search;
    public $nama, $email, $password, $password_confirmation, $murid_id;

    protected function rules()
    {
        $data = [
            'nama' => 'required',
            'email' => ['required', 'email', 'unique:App\Models\User,email'],
            'password' => ['required', Password::min(8), 'confirmed'],
            'password_confirmation' => ['required', Password::min(8)]
        ];

        if ($this->edit) {
            $murid = User::find($this->murid_id);
            $data['email'] = ['required', 'email'];
            $data['password'] = [];
            $data['password_confirmation'] = [];

            if ($this->email != $murid->email) {
                $data['email'] = ['required', 'email', 'unique:App\Models\User,email'];
            }
            if ($this->password) {
                $data['password'] = ['required', Password::min(8), 'confirmed'];
                $data['password_confirmation'] = ['required', Password::min(8)];
            }
        }

        return $data;
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

    public function edit(User $user)
    {
        $this->edit = true;

        $this->nama = $user->name;
        $this->email = $user->email;
        $this->murid_id = $user->id;
    }

    public function update(User $user)
    {
        $this->validate();

        $data = [
            'name' => $this->nama,
            'email' => $this->email
        ];

        if ($this->password) {
            $data['password'] = bcrypt($this->password);
        }

        $user->update($data);

        session()->flash('sukses', 'Data berhasil diubah.');
        $this->format();
    }

    public function hapus($id)
    {
        $this->hapus = true;
        $this->murid_id = $id;
    }

    public function delete(User $user)
    {
        $user->delete();

        $this->updatingSearch();
        session()->flash('sukses', 'Data berhasil dihapus.');
        $this->format();
    }

    public function lihat_quiz($id)
    {
        session(['murid_id' => $id]);
        redirect('/murid_quiz');
    }

    public function render()
    {
        if ($this->search) {
            $murid = User::role('murid')->where('name', 'like', '%'. $this->search .'%')->paginate(5);
        } else {
            $murid = User::role('murid')->paginate(5);
        }
       
        return view('livewire.guru.semua-murid', compact('murid'));
    }

    public function format()
    {
        $this->tambah = false;
        $this->edit = false;
        $this->hapus = false;

        unset($this->nama);
        unset($this->email);
        unset($this->password);
        unset($this->password_confirmation);
        unset($this->murid_id);
    }
}
