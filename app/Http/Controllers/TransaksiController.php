<?php

namespace App\Http\Controllers;

use App\Models\akun;
use App\Models\kategori;
use App\Models\Settingweb;
use App\Models\transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['transaksi'] = Transaksi::with(['akun', 'kategori'])->orderBy('tanggal', 'desc')->paginate(10);
        $data['akun'] = Akun::all();
        $data['kategori'] = Kategori::all();
        $data['jmlTransaksi'] = Transaksi::count();
        $data['jmlPemasukan'] = Transaksi::where('jenis', 'PEMASUKAN')->sum('jumlah');
        $data['jmlPengeluaran'] = Transaksi::where('jenis', 'PENGELUARAN')->sum('jumlah');
        $data['settings'] = Settingweb::find(1);
        return view('transaksi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'akun_id' => 'required',
            'kategori_id' => 'required',
            'tanggal' => 'required',
            'jumlah' => 'required',
            'jenis' => 'required',
            'keterangan' => 'required'
        ]);

        transaksi::create([
            'akun_id' => $request->akun_id,
            'kategori_id' => $request->kategori_id,
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
            'jenis' => $request->jenis,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Data Transaksi Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    // public function show(transaksi $transaksi)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $transaksi = transaksi::findOrFail($id);
        $settings = Settingweb::find(1);
        $akun = akun::all();
        $kategori = kategori::all();
        return view('transaksi.edit', compact('transaksi', 'settings', 'akun', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, transaksi $transaksi)
    {
        $transaksi->update($request->all());
        return redirect()->route('transaksi.index')->with('success', 'Data Transaksi anda berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(transaksi $transaksi)
    {
        try {
            $transaksi->delete();
            return redirect()->route('transaksi.index')->with('success', 'Data Transaksi Anda Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->route('transaksi.index')->with('error', 'Terjadi kesalahan saat menghapus Data Transaksi.');
        }
    }
}
