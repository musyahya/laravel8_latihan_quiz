<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        return view('profil');
    }

    public function update(Request $request)
    {
        return redirect()->back()->with('gagal', 'Data tidak boleh diubah');
        
        $data = [
            'nama' => 'required',
            'email' => 'required|email',
        ];

        if (auth()->user()->email != $request->email) {
            $data['email'] = ['required', 'email', 'unique:App\Models\User,email'];
        }

        $request->validate($data);

        User::whereId(auth()->id())->update([
            'name' => $request->nama,
            'email' => $request->email
        ]);

        return redirect()->back()->with('sukses', 'Data berhasil diubah');
    }
}
