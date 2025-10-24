<?php

namespace App\Http\Controllers;

use App\Models\Asesmen;
use App\Models\Pendaftaran;
use Barryvdh\DomPDF\Facade\Pdf;

class HasilController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $pendaftaran = Pendaftaran::where('user_id', $user->id)->first();

        if (!$pendaftaran) {
            return view('hasil')->with('asesmen', null);
        }

        $asesmen = Asesmen::where('pendaftaran_id', $pendaftaran->id)->first();

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
        )
        ->get()
        ->groupBy('form_asesmen_header_id');



        return view('hasil', compact('asesmen', 'totalSkor', 'maxSkor', 'persen', 'hasilAsesmen'));
    }

    public function exportPdf()
    {
        $user = auth()->user();
        $pendaftaran = Pendaftaran::where('user_id', $user->id)->first();
        $asesmen = Asesmen::where('pendaftaran_id', $pendaftaran->id)->first();

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
        )
        ->get()
        ->groupBy('form_asesmen_header_id');

        $pdf = Pdf::loadView('hasil_pdf', compact('asesmen', 'totalSkor', 'maxSkor', 'persen', 'hasilAsesmen'));
        return $pdf->download('hasil_asesmen.pdf');
    }
}
