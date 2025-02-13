<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\Settingweb;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['kategoris'] = kategori::all();
        $data['settings'] = Settingweb::find(1);
        return view('kategori.index', $data);
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
            'nama_kategori' => 'required',
            'sub_kategori' => 'required',
            'tipe' => 'required',
        ]);

        kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'sub_kategori' => $request->sub_kategori,
            'tipe' => $request->tipe,
        ]);
        return redirect()->route('kategori.index')->with('success', 'Data Kategori anda berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    // public function show(kategori $kategori)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategori = kategori::findOrFail($id);
        $settings = Settingweb::find(1);
        return view('kategori.edit', compact('kategori', 'settings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kategori $kategori)
    {
        $kategori->update($request->all());
        return redirect()->route('kategori.index')->with('success', 'Data Kategori Berhasil Dibuat.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kategori $kategori)
    {
        try {
            $kategori->delete();
            return redirect()->route('kategori.index')->with('success', 'Data Kategori Anda Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->route('kategori.index')->with('error', 'Terjadi kesalahan saat menghapus kategori.');
        }
    }
}
