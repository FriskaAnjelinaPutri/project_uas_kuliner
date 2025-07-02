<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin Kuliner',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345'),
            'role' => 'admin',
        ]);

        // Pemilik
        User::create([
            'name' => 'Pemilik Cafe',
            'email' => 'pemilik@example.com',
            'password' => Hash::make('123456'),
            'role' => 'pemilik',
        ]);
    }
}
