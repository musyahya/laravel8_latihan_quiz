<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class GantiPasswordController extends Controller
{
    public function index()
    {
        return view('gantipassword');
    }

    public function update(Request $request)
    {
        return redirect()->back()->with('gagal', 'Data tidak boleh diubah');

        $data = [
            'password' => ['required', Password::min(8), 'confirmed'],
            'password_confirmation' => ['required', Password::min(8)]
        ];

        $request->validate($data);
        
        User::whereId(auth()->id())->update([
            'password' => bcrypt($request->password),
        ]);

        return redirect()->back()->with('sukses', 'Data berhasil diubah');
    }
}
