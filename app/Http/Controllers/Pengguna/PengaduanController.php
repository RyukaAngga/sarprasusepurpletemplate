<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\SaranaPrasarana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role !== 'pengguna') {
            return redirect()->route('admin.dashboard');
        }

        $pengaduan = Pengaduan::with(['sarana'])
            ->where('id_user', Auth::id())
            ->latest('id_pengaduan')
            ->get();

        return view('pengguna.pengaduan.index', compact('pengaduan'));
    }

    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role !== 'pengguna') {
            return redirect()->route('admin.dashboard');
        }

        $sarana = SaranaPrasarana::all();

        return view('pengguna.pengaduan.create', compact('sarana'));
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role !== 'pengguna') {
            return redirect()->route('admin.dashboard');
        }

        $request->validate([
            'id_sarana' => 'required|exists:sarana_prasarana,id_sarana',
            'tanggal_pengaduan' => 'required|date',
            'deskripsi' => 'required|string',
        ]);

        Pengaduan::create([
            'id_user' => Auth::id(),
            'id_sarana' => $request->id_sarana,
            'tanggal_pengaduan' => $request->tanggal_pengaduan,
            'deskripsi' => $request->deskripsi,
            'status' => 'Menunggu',
            'keterangan_perbaikan' => null,
        ]);

        return redirect()
            ->route('pengguna.pengaduan.index')
            ->with('success', 'Pengaduan berhasil dikirim.');
    }
}
