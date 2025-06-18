<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    public function index()
{
    $notifikasi = \App\Models\Notifikasi::where('user_id', auth()->id())
                    ->orderBy('created_at', 'desc')
                    ->get();

    // Tandai semua notifikasi sebagai "dibaca" setelah dilihat
    \App\Models\Notifikasi::where('user_id', auth()->id())
        ->where('status', 'belum_dibaca')
        ->update(['status' => 'dibaca']);

    return view('notifikasi.index', compact('notifikasi'));
}


    public function store(Request $request)
    {
        Notifikasi::create([
            'user_id' => $request->user_id,
            'pesan' => $request->pesan,
            'status' => 'belum_dibaca',
        ]);

        return response()->json(['message' => 'Notifikasi berhasil dikirim']);
    }
}
