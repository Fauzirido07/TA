<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Notifikasi;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin() {
        return view('login');
    }

    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        // Redirect berdasarkan role
        switch ($user->role) {
            case 'staff':
                return redirect()->route('admin.dashboard');
            case 'guru':
                return redirect()->route('guru.dashboard');
            case 'pendaftar':
                return redirect()->route('dashboard.pendaftar');
            default:
                Auth::logout();
                return redirect('/login')->withErrors('Peran tidak dikenali.');
        }
    }

    return back()->withErrors('Email atau password salah.');
}


    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
    
    public function register(Request $request)
{
    $data = $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
    ]);

    DB::beginTransaction();
    try {
        // Membuat user baru
        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
            'role' => 'pendaftar',
        ]);
        // dd($user);


        // Mengirimkan notifikasi ke seluruh staff
        // $adminList = \App\Models\User::where('role', 'staff')->get();

        // foreach ($adminList as $admin) {
        //     Notifikasi::create([
        //         'user_id' => $admin->id,
        //         'pesan' => "Pendaftar baru: {$request->nama}",
        //         'status' => 'belum dibaca',
        //     ]);
        // }

        DB::commit();

        // Menampilkan pesan sukses dan mengarahkan ke halaman login
        Session::flash('success', 'Akun berhasil dibuat. Silakan login.');
        return redirect()->route('login');
    } catch (\Exception $e) {
        DB::rollBack();
        // Menangani error jika pendaftaran gagal
        Session::flash('error', 'Pendaftaran gagal. Silakan coba lagi.');
        return back();
    }
}
}