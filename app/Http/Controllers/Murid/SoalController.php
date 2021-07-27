<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('murid/soal/index');
    }
}
