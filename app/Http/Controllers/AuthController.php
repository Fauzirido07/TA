<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin() {
        return view('login');
    }

    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string|min:6',
    ]);

    $key = Str::lower($request->email).'|'.$request->ip();

    // Hitungan gagal sebelumnya
    $attempts = RateLimiter::attempts($key);

    // Kelompok gagal per 5x attempt
    $blockLevel = floor($attempts / 5);

    // Naik 2x tiap block, tapi mulai dari 30 detik
    $delay = 30 * (2 ** $blockLevel);

    // Batasi maksimal 30 hari
    $maxDelay = 60 * 60 * 24 * 30; // 30 hari
    $delay = min($delay, $maxDelay);

    // Cek apakah user lagi kena delay
    if (RateLimiter::tooManyAttempts($key, $attempts)) {
    $seconds = RateLimiter::availableIn($key);

    return back()
        ->withErrors(['email' => "Silahkan coba lagi dalam {$seconds} detik."])
        ->with('lock_seconds', $seconds); // ⬅️ ini yang penting
    }          


    // Cek autentikasi
    if (!Auth::attempt($request->only('email','password'))) {

        // Hit + delay sesuai level
        RateLimiter::hit($key, $delay);

        return back()->withErrors([
            'email' => 'Email atau password salah.'
        ]);
    }

    // Login berhasil → reset limiter
    RateLimiter::clear($key);

    $user = Auth::user();

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

    public function editProfile()
{
    return view('profile.edit');
}

   public function updateProfile(Request $request)
{
    $user = auth()->user();

   $request->validate([
        'nama' => 'required|string|max:255|unique:users,nama,' . $user->id,
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password_lama' => 'nullable|string|min:6', 
        'password' => 'nullable|confirmed',
        'foto' => 'nullable|image|max:2048'
    ], [
        'nama.unique' => 'Nama sudah digunakan pengguna lain.',
        'email.unique' => 'Email sudah digunakan pengguna lain.'
    ]);


    // Update nama & email
    $user->nama = $request->nama;
    $user->email = $request->email;

    // Update password
    if ($request->password_lama && $request->password) {
        if (!\Hash::check($request->password_lama, $user->password)) {
            return back()->with('error', 'Password lama tidak sesuai.');
        }
        $user->password = bcrypt($request->password);
    }

    // Upload foto
    if ($request->hasFile('foto')) {

        if ($user->foto && file_exists(public_path('uploads/foto/' . $user->foto))) {
            unlink(public_path('uploads/foto/' . $user->foto));
        }

        $filename = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('uploads/foto'), $filename);
        $user->foto = $filename;
    }

    $user->save();

    return back()->with('success', 'Profil berhasil diperbarui.');
}

}