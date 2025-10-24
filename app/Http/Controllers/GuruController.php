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

    $maxPerGejala = 5;
    $totalSkor = $asesmen->skor ?? 0;
    $totalGejala = 0;

    $hasilAsesmen = \App\Models\HasilAsesmen::where('asesmen_id', $asesmen->id)
        ->with('formAsesmen')
        ->get();

    foreach ($hasilAsesmen as $item) {
        if ($item->formAsesmen->question_type == 1) {
            $totalGejala++;
        }
    }

    $maxSkor = $totalGejala * $maxPerGejala;
    $persen = $maxSkor > 0 ? round(($totalSkor / $maxSkor) * 100) : 0;

    $hasilAsesmen = \App\Models\HasilAsesmen::where('asesmen_id', $asesmen->id)
        ->join('form_asesmen', 'hasil_asesmen.form_asesmen_id', '=', 'form_asesmen.id')
        ->join('form_asesmen_header', 'form_asesmen.form_asesmen_header_id', '=', 'form_asesmen_header.id')
        ->select(
            'hasil_asesmen.*',
            'form_asesmen.form_asesmen_header_id',
            'form_asesmen_header.title as header_title',
            'form_asesmen.question_type',
            'form_asesmen.order',
        )
        ->get()
        ->groupBy('form_asesmen_header_id');



    return view('guru.detail_asesmen', compact('asesmen', 'totalSkor', 'maxSkor', 'persen', 'hasilAsesmen'));
}
}
