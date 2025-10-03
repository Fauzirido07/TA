<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProsedurPendaftaran;

class LandingPageController extends Controller
{
    function landingPage()
    {
        $prosedur = ProsedurPendaftaran::all();
        return view('landing', compact('prosedur'));
    }
}
