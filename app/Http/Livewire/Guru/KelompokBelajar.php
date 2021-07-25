<?php

namespace App\Http\Livewire\Guru;

use App\Models\KelompokBelajar as ModelsKelompokBelajar;
use Livewire\Component;
use Livewire\WithPagination;

class KelompokBelajar extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $kelompok_belajar = ModelsKelompokBelajar::paginate(1);
        return view('livewire.guru.kelompok-belajar', compact('kelompok_belajar'));
    }
}
