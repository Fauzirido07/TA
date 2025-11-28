<?php

namespace App\Http\Controllers;

use App\Models\DaftarUlang;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class DaftarUlangController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pendaftaran = Pendaftaran::where('user_id', $user->id)->first();
        $daftarUlang = null;
        if ($pendaftaran) {
            $daftarUlang = $pendaftaran->daftarUlang;
        }
        

        return view('daftar_ulang', compact('pendaftaran', 'daftarUlang'));
    }

    public function update(Request $request)
    {
        $validationRules = [
            'akta_kelahiran' => 'required|file|mimes:pdf,jpg,jpeg,png|max:10240',
            'kartu_keluarga' => 'required|file|mimes:pdf,jpg,jpeg,png|max:10240',
            'ktp' => 'required|file|mimes:pdf,jpg,jpeg,png|max:10240',
            'surat_test_pendengaran' => 'required|file|mimes:pdf,jpg,jpeg,png|max:10240',
            'form_ttd' => 'required|file|mimes:pdf,jpg,jpeg,png|max:10240',
            'bukti_bayar' => 'required|file|mimes:pdf,jpg,jpeg,png|max:10240',
        ];
        $request->validate($validationRules);
        $user = Auth::user();
        $pendaftaran = Pendaftaran::where('user_id', $user->id)->first();
        $daftarUlang = DaftarUlang::where('pendaftaran_id', $pendaftaran->id)->first();

        if (!$daftarUlang) {
            $daftarUlang = new DaftarUlang();
            $daftarUlang->pendaftaran_id = $pendaftaran->id;
        }
        
        $path = public_path('uploads/dokumen/'.$user->id);
        
        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }

        if ($request->hasFile('akta_kelahiran')) {
            $path = $request->file('akta_kelahiran')->store('uploads/dokumen/'.$user->id, 'public_html');
            $daftarUlang->akta_path = $path;
        }
        if ($request->hasFile('kartu_keluarga')) {
            $path = $request->file('kartu_keluarga')->store('uploads/dokumen/'.$user->id, 'public_html');
            $daftarUlang->kk_path = $path;
        }
        if ($request->hasFile('ktp')) {
            $path = $request->file('ktp')->store('uploads/dokumen/'.$user->id, 'public_html');
            $daftarUlang->ktp_path = $path;
        }
        if ($request->hasFile('surat_test_pendengaran')) {
            $path = $request->file('surat_test_pendengaran')->store('uploads/dokumen/'.$user->id, 'public_html');
            $daftarUlang->st_path = $path;
        }
        if ($request->hasFile('form_ttd')) {
            $path = $request->file('form_ttd')->store('uploads/dokumen/'.$user->id, 'public_html');
            $daftarUlang->form_path = $path;
        }
        if ($request->hasFile('bukti_bayar')) {
            $path = $request->file('bukti_bayar')->store('uploads/dokumen/'.$user->id, 'public_html');
            $daftarUlang->bukti_path = $path;
        }

        $daftarUlang->save();

        return redirect()->route('daftar-ulang.index')->with('success', 'Data daftar ulang berhasil diperbarui.');
    }
}
