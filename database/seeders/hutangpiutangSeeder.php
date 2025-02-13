<?php

namespace Database\Seeders;

use App\Models\hutangpiutang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class hutangpiutangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        hutangpiutang::factory()->count(100)->create();
    }
}
