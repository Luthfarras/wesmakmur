<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Kategori;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Kategori::create([
            'namaKategori' => 'Kesehatan',
            'descKategori' => 'untuk kesehatan',
        ]);
        Kategori::create([
            'namaKategori' => 'Batuk',
            'descKategori' => 'untuk batuk-batuk',
        ]);
        Kategori::create([
            'namaKategori' => 'Pegal',
            'descKategori' => 'untuk pegal-pegal',
        ]);
        Kategori::create([
            'namaKategori' => 'Hipertensi',
            'descKategori' => 'untuk darah tinggi',
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
