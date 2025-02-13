<?php

namespace App\Http\Controllers;

use App\Models\akun;
use App\Models\hutangpiutang;
use App\Models\Settingweb;
use Illuminate\Http\Request;

class HutangpiutangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['hutangpiutang'] = hutangpiutang::with(['akun'])->orderBy('jatuh_tempo', 'desc')->paginate(10);
        $data['akun'] = akun::all();
        $data['settings'] = Settingweb::find(1);
        return view('hutangpiutang.index', $data);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  */
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
            'nama_pihak' => 'required',
            'jenis' => 'required',
            'jatuh_tempo' => 'required',
            'status' => 'required',
        ]);

        hutangpiutang::create([
            'akun_id' => $request->akun_id,
            'nama_pihak' => $request->nama_pihak,
            'jenis' => $request->jenis,
            'jatuh_tempo' => $request->jatuh_tempo,
            'status' => $request->status,
        ]);

        return redirect()->route('hutangpiutang.index')->with('success', 'Data Hutang Piutang anda berhasi dibuat.');
    }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(hutangpiutang $hutangpiutang)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $hutangpiutang = hutangpiutang::findOrFail($id);
        $settings = Settingweb::find(1);
        $akun = akun::all();
        return view('hutangpiutang.edit', compact('hutangpiutang', 'settings', 'akun'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, hutangpiutang $hutangpiutang)
    {
        $hutangpiutang->update($request->all());
        return redirect()->route('hutangpiutang.index')->with('success', 'Data Hutang Piutang anda berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(hutangpiutang $hutangpiutang)
    {
        try {
            $hutangpiutang->delete();
            return redirect()->route('hutangpiutang.index')->with('success', 'Data Hutang Piutang Anda Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->route('hutangpiutang.index')->with('error', 'Terjadi Hutang Piutang saat menghapus kategori.');
        }
    }
}
