<?php

namespace App\Http\Controllers;

use App\Models\JadwalAsesmen;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function adminIndex()
{
    $jadwal = JadwalAsesmen::orderBy('tanggal')->get();
    return view('admin.jadwal.index', compact('jadwal'));
}

public function create()
{
    $pendaftar = \App\Models\Pendaftaran::all();
    return view('admin.jadwal.create', compact('pendaftar'));
}

public function store(Request $request)
{
    $request->validate([
        'pendaftaran_id' => 'required|exists:pendaftaran,id',
        'tanggal' => 'required|date',
        'waktu' => 'required',
        'lokasi' => 'required|string|max:255',
    ]);

    \App\Models\JadwalAsesmen::create($request->all());

    return redirect()->route('admin.jadwal')->with('success', 'Jadwal berhasil ditambahkan.');
}

public function edit($id)
{
    $jadwal = JadwalAsesmen::findOrFail($id);
    return view('admin.jadwal.edit', compact('jadwal'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'tanggal' => 'required|date',
        'waktu' => 'required',
        'lokasi' => 'required|string|max:255',
    ]);

    $jadwal = JadwalAsesmen::findOrFail($id);
    $jadwal->update($request->all());

    return redirect()->route('admin.jadwal')->with('success', 'Jadwal berhasil diperbarui.');
}

public function destroy($id)
{
    JadwalAsesmen::destroy($id);
    return back()->with('success', 'Jadwal berhasil dihapus.');
}

public function index()
{
    $user = auth()->user();
    $pendaftaran = \App\Models\Pendaftaran::where('user_id', $user->id)->first();

    if (!$pendaftaran) {
        return view('jadwal')->with('jadwal', collect());
    }

    $jadwal = \App\Models\JadwalAsesmen::where('pendaftaran_id', $pendaftaran->id)->get();

    return view('jadwal', compact('jadwal'));
}

}
