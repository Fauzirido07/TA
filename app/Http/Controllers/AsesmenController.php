<?php

namespace App\Http\Controllers;

use App\Models\Asesmen;
use Illuminate\Http\Request;

class AsesmenController extends Controller
{
    public function index()
{
    if (auth()->user()->role === 'guru') {
        // Jika guru, tampilkan view asesmen (pilih siswa)
        $pendaftar = \App\Models\Pendaftaran::all();
        return view('asesmen', compact('pendaftar'));
    }

    // Jika pendaftar, langsung arahkan ke dashboard
    return redirect()->route('dashboard.pendaftar')->with('info', 'Anda tidak diizinkan mengakses halaman asesmen.');
}


public function store(Request $request)
{
    $isGuru = auth()->user()->role === 'guru';

    $request->validate([
        'pendengaran' => 'required|array',
        'pendengaran.*' => 'integer|min:1|max:5',

        'berbakat' => 'required|array',
        'berbakat.*' => 'integer|min:1|max:5',

        'kesulitan' => 'required|array',
        'kesulitan.*' => 'integer|min:1|max:5',

        'kesimpulan' => 'required|string',
        'pendaftaran_id' => $isGuru ? 'required|exists:pendaftaran,id' : 'nullable',
    ]);

    $pendaftaran_id = $isGuru
        ? $request->pendaftaran_id
        : \App\Models\Pendaftaran::where('user_id', auth()->id())->first()?->id;

    \App\Models\Asesmen::create([
        'pendaftaran_id' => $pendaftaran_id,
        'guru_id' => $isGuru ? auth()->id() : null,
        'skor' => array_sum($request->pendengaran)
               + array_sum($request->berbakat)
               + array_sum($request->kesulitan),
        'hasil_asesmen' => json_encode([
            'pendengaran' => $request->pendengaran,
            'berbakat' => $request->berbakat,
            'kesulitan' => $request->kesulitan,
        ]),
        'rekomendasi' => $request->kesimpulan,
    ]);

    return back()->with('success', 'Asesmen berhasil disimpan.');
}


public function detail()
{
    $pendaftaran = \App\Models\Pendaftaran::where('user_id', auth()->id())->first();

    if (!$pendaftaran) return redirect()->route('dashboard.pendaftar');

    $asesmen = \App\Models\Asesmen::where('pendaftaran_id', $pendaftaran->id)->first();
    if (!$asesmen) return redirect()->route('asesmen');

    $jawaban = json_decode($asesmen->hasil_asesmen ?? '{}', true);

    return view('asesmen.detail', compact('asesmen', 'jawaban'));
}

    
}
