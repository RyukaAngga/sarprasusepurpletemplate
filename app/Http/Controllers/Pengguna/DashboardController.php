<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\SaranaPrasarana;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $totalPengaduanSaya = Pengaduan::where('id_user', $userId)->count();
        $pengaduanSelesai = Pengaduan::where('id_user', $userId)->where('status', 'Selesai')->count();
        $totalSarana = SaranaPrasarana::count();
        $pengaduanSaya = Pengaduan::with(['sarana'])->where('id_user', $userId)->latest('id_pengaduan')->take(6)->get();

        return view('pengguna.dashboard', compact('totalPengaduanSaya', 'pengaduanSelesai', 'totalSarana', 'pengaduanSaya'));
    }
}
