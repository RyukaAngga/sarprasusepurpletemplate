<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SaranaPrasarana;
use Illuminate\Http\Request;

class SaranaPrasaranaController extends Controller
{
    /**
     * Menampilkan semua data sarana prasarana.
     */
    public function index()
    {
        $sarana = SaranaPrasarana::latest()->get();

        return view('admin.sarana.index', compact('sarana'));
    }

    /**
     * Menampilkan form tambah data.
     */
    public function create()
    {
        return view('admin.sarana.create');
    }

    /**
     * Menyimpan data baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_sarana' => 'required|string|max:100',
            'lokasi' => 'required|string|max:100',
            'kondisi' => 'required|string|max:50',
            'keterangan' => 'nullable|string',
        ]);

        SaranaPrasarana::create([
            'nama_sarana' => $request->nama_sarana,
            'lokasi' => $request->lokasi,
            'kondisi' => $request->kondisi,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()
            ->route('admin.sarana.index')
            ->with('success', 'Data sarana prasarana berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail data.
     */
    public function show(SaranaPrasarana $sarana)
    {
        return view('admin.sarana.show', compact('sarana'));
    }

    /**
     * Menampilkan form edit.
     */
    public function edit(SaranaPrasarana $sarana)
    {
        return view('admin.sarana.edit', compact('sarana'));
    }

    /**
     * Memperbarui data.
     */
    public function update(Request $request, SaranaPrasarana $sarana)
    {
        $request->validate([
            'nama_sarana' => 'required|string|max:100',
            'lokasi' => 'required|string|max:100',
            'kondisi' => 'required|string|max:50',
            'keterangan' => 'nullable|string',
        ]);

        $sarana->update([
            'nama_sarana' => $request->nama_sarana,
            'lokasi' => $request->lokasi,
            'kondisi' => $request->kondisi,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()
            ->route('admin.sarana.index')
            ->with('success', 'Data sarana prasarana berhasil diperbarui.');
    }

    /**
     * Menghapus data.
     */
    public function destroy(SaranaPrasarana $sarana)
    {
        $sarana->delete();

        return redirect()
            ->route('admin.sarana.index')
            ->with('success', 'Data sarana prasarana berhasil dihapus.');
    }
}
