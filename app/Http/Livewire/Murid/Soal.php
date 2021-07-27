<?php

namespace App\Http\Livewire\Murid;

use App\Models\Quiz;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Soal extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $pilih;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $quiz = Quiz::find(session('quiz_id'));
        $soal = $quiz->soal;
        foreach ($soal as $key => $value) {
            $this->pilih[$key] = '';
        }
    }

    public function pilih($pilihan, $page)
    {
        $this->pilih[$page - 1] = $pilihan;
    }

    public function selesai()
    {
        $quiz = Quiz::find(session('quiz_id'));
        $soal = $quiz->soal;
        $jawaban = $soal->map(function ($item) {
            return $item->jawaban;
        });

        $benar = 0;
        for ($a = 0; $a < count($this->pilih); $a++) {
            for ($b = 0; $b < count($jawaban); $b++) {
                if ($this->pilih[$a] == $jawaban[$a]) {
                    $benar = $benar + 1;
                    break;
                } else {
                    $benar = $benar;
                    break;
                }
            }
        }
        $hasil = $benar / count($jawaban) * 100;

        DB::table('quiz_murid')->where('quiz_id', session('quiz_id'))->where('murid_id', auth()->id())->update([
            'benar' => $benar,
            'nilai' => $hasil,
            'status' => '1'
        ]);

        for ($a=0; $a < count($soal); $a++) {
            DB::table('quiz_jawaban_murid')->insert([
                'soal_id' => $soal[$a]->id,
                'murid_id' => auth()->id(),
                'jawaban_murid' => $this->pilih[$a]
            ]);
        }

        session()->flash('sukses', 'Quiz berhasil diselesaikan.');
        redirect('/quiz/murid');
    }

    public function render()
    {
        $quiz = Quiz::find(session('quiz_id'));
        $soal = $quiz->soal()->paginate(1);
        return view('livewire.murid.soal', compact('soal'));
    }
}
