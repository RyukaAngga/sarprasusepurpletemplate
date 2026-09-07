<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin Sekolah',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Pengguna
        User::create([
            'name' => 'Dea Yunita',
            'email' => 'dea@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'pengguna',
        ]);
    }
}
