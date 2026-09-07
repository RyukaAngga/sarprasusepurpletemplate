<?php

namespace Database\Seeders;

use App\Models\Pengaduan;
use Illuminate\Database\Seeder;

class PengaduanSeeder extends Seeder
{
    public function run(): void
    {
        Pengaduan::create([
            'id_user' => 2,
            'id_sarana' => 2,
            'tanggal_pengaduan' => now()->toDateString(),
            'deskripsi' => 'Kursi di ruang kelas mengalami kerusakan dan tidak dapat digunakan dengan baik.',
            'status' => 'Menunggu',
            'keterangan_perbaikan' => null,
        ]);

        Pengaduan::create([
            'id_user' => 2,
            'id_sarana' => 4,
            'tanggal_pengaduan' => now()->toDateString(),
            'deskripsi' => 'Papan tulis di ruang kelas sudah rusak dan sulit digunakan untuk kegiatan belajar.',
            'status' => 'Diproses',
            'keterangan_perbaikan' => 'Sedang dilakukan pemeriksaan dan perbaikan.',
        ]);
    }
}
