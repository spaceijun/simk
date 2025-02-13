<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;

    protected $fillable = ['akun_id', 'kategori_id', 'tanggal', 'jumlah', 'jenis', 'keterangan'];

    public function kategori()
    {
        return $this->belongsTo(kategori::class, 'kategori_id');
    }

    public function akun()
    {
        return $this->belongsTo(akun::class, 'akun_id');
    }
}
