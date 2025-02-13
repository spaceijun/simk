<?php

namespace Database\Seeders;

use App\Models\kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class kategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        kategori::factory()->count(100)->create();
    }
}
