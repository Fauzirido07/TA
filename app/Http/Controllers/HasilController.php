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

        return view('hasil', compact('asesmen'));
    }

    public function exportPdf()
    {
        $user = auth()->user();
        $pendaftaran = Pendaftaran::where('user_id', $user->id)->first();
        $hasil = Asesmen::where('pendaftaran_id', $pendaftaran->id)->get();

        $pdf = Pdf::loadView('hasil_pdf', compact('hasil'));
        return $pdf->download('hasil_asesmen.pdf');
    }
}
