<?php

namespace App\Http\Controllers;

use App\Models\ProsedurPendaftaran;
use Illuminate\Http\Request;

class ProsedurController extends Controller
{
    public function showForPendaftar()
    {
        $prosedur = ProsedurPendaftaran::orderBy('id', 'desc')->first();
        return view('prosedur', compact('prosedur'));
    }

    public function adminIndex()
    {
        $prosedur = ProsedurPendaftaran::orderBy('id', 'desc')->take(1)->get();
        return view('admin.prosedur.index', compact('prosedur'));
    }

    public function store(Request $request)
    {
        $prosedur = new ProsedurPendaftaran();
        $prosedur->deskripsi = 'User Guide untuk Prosedur Pendaftaran';
        if ($request->hasFile('file_panduan')) {
            $path = $request->file('file_panduan')->store('uploads/prosedur', 'public_html');
            $prosedur->file_path = $path;
        }
        $prosedur->save(); 
        
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
