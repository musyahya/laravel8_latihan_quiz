<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
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
