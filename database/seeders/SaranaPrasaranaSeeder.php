<?php

namespace Database\Seeders;

use App\Models\SaranaPrasarana;
use Illuminate\Database\Seeder;

class SaranaPrasaranaSeeder extends Seeder
{
    public function run(): void
    {
        SaranaPrasarana::create([
            'nama_sarana' => 'Meja',
            'lokasi' => 'Ruang Kelas',
            'kondisi' => 'Baik',
            'keterangan' => 'Meja masih dapat digunakan',
        ]);

        SaranaPrasarana::create([
            'nama_sarana' => 'Kursi',
            'lokasi' => 'Ruang Kelas',
            'kondisi' => 'Rusak',
            'keterangan' => 'Beberapa kursi mengalami kerusakan',
        ]);

        SaranaPrasarana::create([
            'nama_sarana' => 'Proyektor',
            'lokasi' => 'Ruang Kelas',
            'kondisi' => 'Baik',
            'keterangan' => 'Proyektor dapat digunakan',
        ]);

        SaranaPrasarana::create([
            'nama_sarana' => 'Papan Tulis',
            'lokasi' => 'Ruang Kelas',
            'kondisi' => 'Rusak',
            'keterangan' => 'Permukaan papan tulis sudah rusak',
        ]);

        SaranaPrasarana::create([
            'nama_sarana' => 'Komputer',
            'lokasi' => 'Laboratorium',
            'kondisi' => 'Baik',
            'keterangan' => 'Komputer dapat digunakan',
        ]);
    }
}
