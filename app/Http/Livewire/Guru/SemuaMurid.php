<?php

namespace App\Http\Livewire\Guru;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class SemuaMurid extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $murid = User::role('murid')->paginate(5);
        return view('livewire.guru.semua-murid', compact('murid'));
    }
}
