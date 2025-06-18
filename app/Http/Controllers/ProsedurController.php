<?php

namespace App\Http\Controllers;

use App\Models\ProsedurPendaftaran;
use Illuminate\Http\Request;

class ProsedurController extends Controller
{
    public function showForPendaftar()
    {
        $prosedur = ProsedurPendaftaran::all();
        return view('prosedur', compact('prosedur'));
    }

    public function adminIndex()
    {
        $prosedur = ProsedurPendaftaran::all();
        return view('admin.prosedur.index', compact('prosedur'));
    }

    public function store(Request $request)
    {
        $request->validate(['deskripsi' => 'required|string']);
        ProsedurPendaftaran::create(['deskripsi' => $request->deskripsi]);
        return back()->with('success', 'Prosedur berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $prosedur = ProsedurPendaftaran::findOrFail($id);
        return view('admin.prosedur.edit', compact('prosedur'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['deskripsi' => 'required|string']);
        ProsedurPendaftaran::where('id', $id)->update(['deskripsi' => $request->deskripsi]);
        return redirect()->route('admin.prosedur')->with('success', 'Prosedur berhasil diperbarui.');
    }

    public function destroy($id)
    {
        ProsedurPendaftaran::destroy($id);
        return back()->with('success', 'Prosedur berhasil dihapus.');
    }

}
