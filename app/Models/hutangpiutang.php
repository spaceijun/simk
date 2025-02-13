<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hutangpiutang extends Model
{
    use HasFactory;

    protected $fillable = ['akun_id', 'nama_pihak', 'jenis', 'nominal', 'jatuh_tempo', 'status'];

    public function akun()
    {
        return $this->belongsTo(akun::class, 'akun_id');
    }
}
