<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'nama' => 'Admin PPDB',
            'email' => 'admin@slb.com',
            'password' => Hash::make('password123'),
            'role' => 'staff'
        ]);

        User::create([
            'nama' => 'Guru Asesmen',
            'email' => 'guru@slb.com',
            'password' => Hash::make('password123'),
            'role' => 'guru'
        ]);

        User::create([
            'nama' => 'Pendaftar Contoh',
            'email' => 'pendaftar@slb.com',
            'password' => Hash::make('password123'),
            'role' => 'pendaftar'
        ]);
    }
}
