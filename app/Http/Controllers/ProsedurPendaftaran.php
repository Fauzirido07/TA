<?php

namespace App\Http\Controllers;

use App\Models\ProsedurPendaftaran;
use Illuminate\Http\Request;

class ProsedurController extends Controller
{
    public function index() {
        $prosedur = ProsedurPendaftaran::all();
        return view('prosedur', compact('prosedur'));
    }

    public function store(Request $request) {
        $request->validate([
            'deskripsi' => 'required|string',
        ]);

        ProsedurPendaftaran::create([
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('prosedur')->with('success', 'Prosedur berhasil ditambahkan');
    }
}
