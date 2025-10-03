<?php

namespace App\Http\Controllers;

use App\Models\Asesmen;
use App\Models\Pendaftaran;
use App\Models\FormAsesmenHeader;

class GuruController extends Controller
{
    public function dashboard()
    {
        return view('guru.dashboard');
    }

    public function pilihSiswa()
    {
        $pendaftar = \App\Models\Pendaftaran::with('asesmen')->get(); 
        return view('guru.pilih_siswa', compact('pendaftar'));
    }


    public function isiAsesmen($id)
    {
        $formAsesmenHeader = FormAsesmenHeader::all();
        // dd($formAsesmenHeader->first()->formAsesmen);

        $pendaftaran = Pendaftaran::findOrFail($id);
        return view('guru.isi_asesmen', compact('pendaftaran'));
    }

    public function daftarAsesmen()
    {
    $asesmen = \App\Models\Asesmen::where('guru_id', auth()->id())->with('pendaftaran')->get();
    return view('guru.daftar_asesmen', compact('asesmen'));
    }

    public function detailAsesmen($id)
{
    $asesmen = \App\Models\Asesmen::with('pendaftaran')->findOrFail($id);

    if ($asesmen->guru_id !== auth()->id()) {
        abort(403, 'Anda tidak berhak melihat asesmen ini.');
    }

    $jawaban = json_decode($asesmen->hasil_asesmen ?? '{}', true);

    return view('guru.detail_asesmen', compact('asesmen', 'jawaban'));
}
}
