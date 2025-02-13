<?php

namespace App\Http\Controllers;

use App\Models\akun;
use App\Models\Settingweb;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['akun'] = akun::all();
        $data['settings'] = Settingweb::find(1);
        return view('akun.index', $data);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {

    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_akun' => 'required',
            'no_rek' => 'required',
            'tipe' => 'required',

        ]);

        akun::create([
            'nama_akun' => $request->nama_akun,
            'no_rek' => $request->no_rek,
            'tipe' => $request->tipe,
        ]);

        return redirect()->route('akun.index')->with('success', 'Data Akun anda berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    // public function show(akun $akun)
    // {
    //     $data['akun'] = akun::all();
    //     return view('akun.index', $data);
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $akun = akun::findOrFail($id);
        $settings = Settingweb::find(1);
        return view('akun.edit', compact('akun', 'settings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, akun $akun)
    {
        $akun->update($request->all());
        return redirect()->route('akun.index')->with('success', 'Data Akun anda berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(akun $akun)
    {
        try {
            $akun->delete();
            return redirect()->route('akun.index')->with('success', 'Data Kategori Anda Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->route('akun.index')->with('error', 'Terjadi kesalahan saat menghapus kategori.');
        }
    }
}
