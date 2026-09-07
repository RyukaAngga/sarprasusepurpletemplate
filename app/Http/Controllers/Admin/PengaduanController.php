<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role !== 'admin') {
            return redirect()->route('pengguna.dashboard');
        }

        $pengaduan = Pengaduan::with(['user', 'sarana'])
            ->latest('id_pengaduan')
            ->get();

        return view('admin.pengaduan.index', compact('pengaduan'));
    }

    public function show($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $pengaduan = Pengaduan::with(['user', 'sarana'])
            ->findOrFail($id);

        return view('admin.pengaduan.show', compact('pengaduan'));
    }

    public function edit($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $pengaduan = Pengaduan::with(['user', 'sarana'])
            ->findOrFail($id);

        return view('admin.pengaduan.edit', compact('pengaduan'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $request->validate([
            'status' => 'required|in:Menunggu,Diproses,Selesai,Ditolak',
            'keterangan_perbaikan' => 'nullable|string',
        ]);

        $pengaduan = Pengaduan::findOrFail($id);

        $pengaduan->update([
            'status' => $request->status,
            'keterangan_perbaikan' => $request->keterangan_perbaikan,
        ]);

        return redirect()
            ->route('admin.pengaduan.index')
            ->with('success', 'Pengaduan berhasil diperbarui.');
    }
}
