<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settingweb extends Model
{
    use HasFactory;

    protected $table = 'settingwebs';
    protected $fillable = [
        'nama_website',
        'deskripsi_website',
        'favicon_website',
        'logo_website',
        'telepon',
        'alamat',
        'copyright',
    ];
}
