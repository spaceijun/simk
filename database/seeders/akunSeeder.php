<?php

namespace Database\Seeders;

use App\Models\akun;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class akunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        akun::factory()->count(100)->create();
    }
}
