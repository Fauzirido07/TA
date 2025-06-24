<?php

namespace App\Http\Controllers;

use App\Models\Asesmen;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class AsesmenController extends Controller
{
    // Menampilkan daftar pendaftar untuk guru
    public function index()
    {
        if (auth()->user()->role === 'guru') {
            // Ambil semua pendaftar beserta asesmen (eager loading)
            $pendaftar = Pendaftaran::with('asesmen')->get();

            return view('asesmen', compact('pendaftar'));
        }

        return redirect()->route('dashboard.pendaftar')
            ->with('info', 'Anda tidak diizinkan mengakses halaman asesmen.');
    }

    // Menampilkan form asesmen untuk pendaftar tertentu
    public function form($pendaftaranId)
    {
        $pendaftaran = Pendaftaran::findOrFail($pendaftaranId);

        // Cek apakah sudah ada asesmen untuk pendaftar ini
        if (Asesmen::where('pendaftaran_id', $pendaftaranId)->exists()) {
            return redirect()->route('asesmen.index')
                ->with('info', 'Asesmen untuk pendaftar ini sudah pernah diisi.');
        }

        return view('guru.isi_asesmen', compact('pendaftaran'));
    }

    // Menyimpan hasil asesmen
    public function store(Request $request)
    {
        $isGuru = auth()->user()->role === 'guru';

        // Validasi input
        $rules = [
            'pendaftaran_id' => $isGuru ? 'required|exists:pendaftaran,id' : 'nullable',

            'gangguan_penglihatan' => 'required|array',
            'gangguan_penglihatan.*' => 'integer|min:1|max:5',

            'gangguan_pendengaran' => 'required|array',
            'gangguan_pendengaran.*' => 'integer|min:1|max:5',

            'tunagrahita' => 'required|array',
            'tunagrahita.*' => 'integer|min:1|max:5',

            'tunadaksa' => 'required|array',
            'tunadaksa.*' => 'integer|min:1|max:5',

            'tunalaras' => 'required|array',
            'tunalaras.*' => 'integer|min:1|max:5',

            'berbakat' => 'required|array',
            'berbakat.*' => 'integer|min:1|max:5',

            'lamban_belajar' => 'required|array',
            'lamban_belajar.*' => 'integer|min:1|max:5',

            'kesulitan_belajar' => 'required|array',
            'kesulitan_belajar.*' => 'integer|min:1|max:5',

            'kesimpulan' => 'required|string',
        ];

        $validated = $request->validate($rules);

        $pendaftaran_id = $isGuru
            ? $validated['pendaftaran_id']
            : Pendaftaran::where('user_id', auth()->id())->first()?->id;

        // Cek apakah asesmen sudah ada untuk pendaftar ini
        if (Asesmen::where('pendaftaran_id', $pendaftaran_id)->exists()) {
            return back()->with('error', 'Asesmen untuk pendaftar ini sudah pernah diisi.');
        }

        // Hitung skor total
        $skor = 0;
        foreach ([
            'gangguan_penglihatan',
            'gangguan_pendengaran',
            'tunagrahita',
            'tunadaksa',
            'tunalaras',
            'berbakat',
            'lamban_belajar',
            'kesulitan_belajar'
        ] as $key) {
            $skor += array_sum($validated[$key]);
        }

        // Batasi skor maksimal 100
        $skor = min($skor, 100);

        // Simpan ke DB
        Asesmen::create([
            'pendaftaran_id' => $pendaftaran_id,
            'guru_id' => $isGuru ? auth()->id() : null,
            'skor' => $skor,
            'hasil_asesmen' => json_encode([
                'gangguan_penglihatan' => $validated['gangguan_penglihatan'],
                'gangguan_pendengaran' => $validated['gangguan_pendengaran'],
                'tunagrahita' => $validated['tunagrahita'],
                'tunadaksa' => $validated['tunadaksa'],
                'tunalaras' => $validated['tunalaras'],
                'berbakat' => $validated['berbakat'],
                'lamban_belajar' => $validated['lamban_belajar'],
                'kesulitan_belajar' => $validated['kesulitan_belajar'],
            ]),
            'rekomendasi' => $validated['kesimpulan'],
        ]);

        return redirect()->route('asesmen.index')->with('success', 'Asesmen berhasil disimpan.');
    }

    // Menampilkan detail asesmen untuk user yang login (pendaftar)
    public function detail()
    {
        $pendaftaran = Pendaftaran::where('user_id', auth()->id())->first();

        if (!$pendaftaran) return redirect()->route('dashboard.pendaftar');

        $asesmen = Asesmen::where('pendaftaran_id', $pendaftaran->id)->first();

        if (!$asesmen) return redirect()->route('asesmen');

        $jawaban = json_decode($asesmen->hasil_asesmen ?? '{}', true);

        return view('asesmen.detail', compact('asesmen', 'jawaban'));
    }
}
