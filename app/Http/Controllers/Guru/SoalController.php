<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Soal;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    public function index()
    {
        return view('guru/soal/index');
    }

    public function create()
    {
        return view('guru/soal/tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'soal' => 'required',
            'pilihan_a' => 'required',
            'pilihan_b' => 'required',
            'pilihan_c' => 'required',
            'pilihan_d' => 'required',
            'pilihan_e' => 'required',
            'jawaban' => 'required',
        ]);

        Soal::create([
            'soal' => $request->soal,
            'pilihan_a' => $request->pilihan_a,
            'pilihan_b' => $request->pilihan_b,
            'pilihan_c' => $request->pilihan_c,
            'pilihan_d' => $request->pilihan_d,
            'pilihan_e' => $request->pilihan_e,
            'jawaban' => $request->jawaban,
            'quiz_id' => session('quiz_id')
        ]);

        $request->session()->flash('sukses', 'Data berhasil ditambahkan');
        return redirect('/soal');
    }

    public function edit(Request $request, $id)
    {
        $soal = Soal::find($id);
        return view('guru/soal/edit', compact('soal'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'soal' => 'required',
            'pilihan_a' => 'required',
            'pilihan_b' => 'required',
            'pilihan_c' => 'required',
            'pilihan_d' => 'required',
            'pilihan_e' => 'required',
            'jawaban' => 'required',
        ]);

        Soal::whereId($id)->update([
            'soal' => $request->soal,
            'pilihan_a' => $request->pilihan_a,
            'pilihan_b' => $request->pilihan_b,
            'pilihan_c' => $request->pilihan_c,
            'pilihan_d' => $request->pilihan_d,
            'pilihan_e' => $request->pilihan_e,
            'jawaban' => $request->jawaban,
            'quiz_id' => session('quiz_id')
        ]);

        $request->session()->flash('sukses', 'Data berhasil diubah');
        return redirect('/soal');
    }
}
