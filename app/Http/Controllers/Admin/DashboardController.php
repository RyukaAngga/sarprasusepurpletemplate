<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\SaranaPrasarana;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPengaduan = Pengaduan::count();
        $totalSarana = SaranaPrasarana::count();
        $totalPengguna = User::where('role', 'pengguna')->count();
        $pengaduanTerbaru = Pengaduan::with(['user', 'sarana'])->latest('id_pengaduan')->take(6)->get();

        return view('admin.dashboard', compact('totalPengaduan', 'totalSarana', 'totalPengguna', 'pengaduanTerbaru'));
    }
}
