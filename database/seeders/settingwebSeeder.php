<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SettingWebSeeder extends Seeder
{
    public function run()
    {
        DB::table('settingwebs')->insert([
            'nama_website' => 'nama_website',
            'deskripsi_website' => 'deskripsi_website',
            'email' => 'email',
            'telepon' => 'telepon',
            'alamat' => 'alamat',
            'copyright' => '© 2025 copyright',
            'favicon_website' => 'default_favicon.png',
            'logo_website' => 'default_logo.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
