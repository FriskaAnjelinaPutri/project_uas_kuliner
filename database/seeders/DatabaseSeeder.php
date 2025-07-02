<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kategori;
use App\Models\TempatMakan;
use App\Models\Promo;
use App\Models\Ulasan;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat 2 user tetap
        $admin = User::create([
            'name' => 'Admin Kuliner',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345'),
            'role' => 'admin',
        ]);

        $pemilik = User::create([
            'name' => 'Pemilik Cafe',
            'email' => 'pemilik@example.com',
            'password' => Hash::make('12345'),
            'role' => 'pemilik',
        ]);

        // Buat user random tambahan (optional)
        User::factory()->count(3)->create();

        // Buat kategori
        Kategori::factory()->count(5)->create();

        $userIds = User::pluck('id')->toArray();
        $kategoriIds = Kategori::pluck('id')->toArray();

        // Tempat Makan
        TempatMakan::factory()->count(10)->create()->each(function ($tempat) use ($userIds, $kategoriIds) {
            $tempat->update([
                'user_id' => fake()->randomElement($userIds),
                'kategori_id' => fake()->randomElement($kategoriIds),
            ]);
        });

        $tempatMakanIds = TempatMakan::pluck('id')->toArray();

        // Promo
        Promo::factory()->count(10)->create()->each(function ($promo) use ($tempatMakanIds) {
            $promo->update([
                'tempat_makan_id' => fake()->randomElement($tempatMakanIds),
            ]);
        });

        // Ulasan
        Ulasan::factory()->count(10)->create()->each(function ($ulasan) use ($tempatMakanIds) {
            $ulasan->update([
                'tempat_makan_id' => fake()->randomElement($tempatMakanIds),
            ]);
        });
    }
}
