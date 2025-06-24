<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pendaftaran;
use App\Models\Asesmen;
use Illuminate\Http\Request; 

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function users()
    {
        $users = \App\Models\User::whereIn('role', ['guru', 'staff'])->get();
        return view('admin.users', compact('users'));
    }

    public function addUser(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        \App\Models\User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'guru'
        ]);

        return redirect()->route('admin.users')->with('success', 'Guru berhasil ditambahkan.');
    }

    public function createUser()
    {
        return view('admin.tambah_guru');
    }

    public function updateRole(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role' => 'required|in:pendaftar,guru,staff'
        ]);

        User::where('id', $request->user_id)->update(['role' => $request->role]);

        return back()->with('success', 'Peran pengguna berhasil diperbarui.');
    }

    public function deleteUser($id)
    {
        $user = \App\Models\User::findOrFail($id);

        if ($user->id === auth()->id()) {
            return back()->with('error', 'Tidak bisa menghapus akun Anda sendiri.');
        }

        $user->delete();

        return back()->with('success', 'Pengguna berhasil dihapus.');
    }

    public function chart()
    {
        $pendaftar = \App\Models\Pendaftaran::all();

        $total_siswa = $pendaftar->count();
        $total_sudah = $pendaftar->filter(function ($item) {
            return $item->asesmen()->exists();
        })->count();
        $total_belum = $total_siswa - $total_sudah;

        // Untuk bar chart gender
        $sudahAsesmenL = $pendaftar->where('jenis_kelamin', 'L')->filter(fn($i) => $i->asesmen()->exists())->count();
        $sudahAsesmenP = $pendaftar->where('jenis_kelamin', 'P')->filter(fn($i) => $i->asesmen()->exists())->count();
        $belumAsesmenL = $pendaftar->where('jenis_kelamin', 'L')->filter(fn($i) => !$i->asesmen()->exists())->count();
        $belumAsesmenP = $pendaftar->where('jenis_kelamin', 'P')->filter(fn($i) => !$i->asesmen()->exists())->count();

        return view('admin.chart', compact('sudahAsesmenL', 'sudahAsesmenP', 'belumAsesmenL', 'belumAsesmenP', 'total_sudah', 'total_belum'));
    }

}
