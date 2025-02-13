<?php

namespace App\Http\Controllers;

use App\Models\hutangpiutang;
use App\Models\Settingweb;
use App\Models\transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['jmlTransaksi'] = transaksi::count();
        $data['jmlPemasukan'] = Transaksi::where('jenis', 'PEMASUKAN')->sum('jumlah');
        $data['jmlPengeluaran'] = Transaksi::where('jenis', 'PENGELUARAN')->sum('jumlah');
        $data['jmlHutang'] = hutangpiutang::where('jenis', 'HUTANG')->sum('nominal');
        $data['jmlPiutang'] = hutangpiutang::where('jenis', 'PIUTANG')->sum('nominal');
        $data['settings'] = Settingweb::find(1);
        return view('dashboard', $data);
    }
}
