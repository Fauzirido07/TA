<?php

namespace App\Http\Controllers;

use App\Models\FormAsesmenHeader;
use App\Models\FormAsesmen;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class GuruAsesmenDinamisController extends Controller
{
    // Menampilkan daftar siswa untuk dipilih guru
    public function pilihSiswa()
    {
        $pendaftar = Pendaftaran::all();
        return view('guru.asesmen_dinamis_pilih', compact('pendaftar'));
    }

    // Menampilkan form asesmen dinamis berdasarkan data dari admin
    public function isiForm($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $headers = FormAsesmenHeader::with('formAsesmen')->get();

        return view('guru.asesmen_dinamis_form', compact('pendaftaran', 'headers'));
    }

    // Menyimpan hasil asesmen dinamis
    public function store(Request $request, $id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $hasil = [];
        foreach ($request->form_asesmen as $key => $value) {
            $formAsesmen = FormAsesmen::find($key);
            if ($formAsesmen->question_type == 1) {
                $hasil[$key] = $value;
            }
        }

        $asesmen =\App\Models\Asesmen::create([
            'pendaftaran_id' => $pendaftaran->id,
            'guru_id' => auth()->id(),
            'hasil_asesmen' => json_encode($hasil),
            'skor' => collect($hasil)->map(fn($v) => (int)$v)->sum(),
            'rekomendasi' => 'Hasil asesmen berhasil disimpan oleh guru.',
        ]);

        foreach ($request->form_asesmen as $key => $value) {
            $formAsesmen = FormAsesmen::find($key);
                \App\Models\HasilAsesmen::create([
                    'asesmen_id' => $asesmen->id,
                    'form_asesmen_id' => $formAsesmen->id,
                    'jawaban' => $value,
                ]);
        }


        return redirect()->route('guru.asesmen_dinamis.pilih')->with('success', 'Asesmen berhasil disimpan.');
    }
}
