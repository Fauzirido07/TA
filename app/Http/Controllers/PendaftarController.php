<?php

namespace App\Http\Controllers;

use App\Models\Asesmen;
use App\Models\Pendaftar;
use App\Models\Pendaftaran;
use App\Models\JadwalAsesmen;
use App\Models\ProsedurPendaftaran;

use Illuminate\Http\Request;

class PendaftarController extends Controller
{
    public function dashboard()
{
    $user = auth()->user();
    $pendaftaran = \App\Models\Pendaftaran::where('user_id', $user->id)->orderByDesc('id')->first();
    $asesmen = null;
    $jadwal = [];

    if ($pendaftaran) {
        $jadwal = \App\Models\JadwalAsesmen::where('pendaftaran_id', $pendaftaran->id)->get();
        $asesmen = \App\Models\Asesmen::where('pendaftaran_id', $pendaftaran->id)->first();
    }

    $prosedur = \App\Models\ProsedurPendaftaran::all();
    // dd($pendaftaran);

    return view('dashboard', compact('pendaftaran', 'asesmen', 'jadwal', 'prosedur'));
}

    // Menampilkan form pendaftaran
    public function create()
    {
        return view('pendaftaran');
    }

    // Menyimpan data pendaftaran
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'wali' => 'required|string|max:255',
            'dokumen_pendukung' => 'nullable|file',
            'status' => 'required|string|max:255',
        ]);
        // Menyimpan data pendaftar
        Pendaftar::create([
            'nama_lengkap' => $validatedData['nama_lengkap'],
            'tanggal_lahir' => $validatedData['tanggal_lahir'],
            'alamat' => $validatedData['alamat'],
            'wali' => $validatedData['wali'],
            'dokumen_pendukung' => $request->file('dokumen_pendukung') ? $request->file('dokumen_pendukung')->store('dokumen_pendukung') : null,
            'status' => $validatedData['status'],
        ]);

        return redirect()->route('pendaftar.dashboard')->with('success', 'Pendaftaran berhasil!');
    }
}
