<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Settingweb;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SettingwebController extends Controller
{
    public function index()
    {
        $data['settings'] = Settingweb::find(1);
        return view('settingweb.index', $data);
    }

    public function update(Request $request)
    {
        $model = Settingweb::find(1);

        $data = [
            'nama_website' => $request->input('nama_website'),
            'deskripsi_website' => $request->input('deskripsi_website'),
            'telepon' => $request->input('telepon'),
            'alamat' => $request->input('alamat'),
            'email' => $request->input('email'),
            'copyright' => $request->input('copyright'),
            'updated_at' => Carbon::now(),
        ];

        if ($request->hasFile('favicon_website') && $request->file('favicon_website')->isValid()) {
            $faviconFile = $request->file('favicon_website');
            $mimeType = $faviconFile->getMimeType();
            $fileSize = $faviconFile->getSize();

            if (in_array($mimeType, ['image/png', 'image/jpeg', 'image/jpg']) && $fileSize <= 2097152) {
                $faviconName = 'fav' . now()->format('YmdHis') . '.' . $faviconFile->getClientOriginalExtension();
                $faviconFile->move(public_path('uploads/settingweb'), $faviconName);
                $data['favicon_website'] = $faviconName;
            } else {
                return redirect()->back()->with('error', 'Favicon harus berupa gambar PNG, JPG, atau JPEG dan maksimal 2MB.')->withInput();
            }
        }

        /**
         * Upload Logo and favicon
         */

        if ($request->hasFile('logo_website') && $request->file('logo_website')->isValid()) {
            $logoFile = $request->file('logo_website');
            $mimeType = $logoFile->getMimeType();
            $fileSize = $logoFile->getSize();

            if (in_array($mimeType, ['image/png', 'image/jpeg', 'image/jpg']) && $fileSize <= 2097152) {
                $logoName = 'logo' . now()->format('YmdHis') . '.' . $logoFile->getClientOriginalExtension();
                $logoFile->move(public_path('uploads/settingweb'), $logoName);
                $data['logo_website'] = $logoName;
            } else {
                return redirect()->back()->with('error', 'Logo harus berupa gambar PNG, JPG, atau JPEG dan maksimal 2MB.')->withInput();
            }
        }

        $model->update($data);
        return redirect()->route('settingweb.index')->with('success', 'Data berhasil diperbarui.');
    }
}
