<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\SaranaPrasarana;

class SaranaController extends Controller
{
    /**
     * Menampilkan daftar sarana prasarana untuk pengguna/siswa.
     */
    public function index()
    {
        $sarana = SaranaPrasarana::latest()->get();

        return view('pengguna.sarana.index', compact('sarana'));
    }
}
