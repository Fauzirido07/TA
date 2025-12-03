<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pendaftaran;
use App\Models\Asesmen;
use App\Models\Notifikasi;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request; 

class AdminController extends Controller
{
    public function dashboard()
    {
        $pendaftarCounts = [
            'sd' => pendaftaran::where('jenjang_sekolah_id', 1)->count(),
            'smp' => pendaftaran::where('jenjang_sekolah_id', 2)->count(),
            'sma' => pendaftaran::where('jenjang_sekolah_id', 3)->count(),
            'total' => pendaftaran::count(),
        ];
        $administrasiCounts = [
            'sudah' => pendaftaran::whereIn('status',['diproses', 'diterima', 'ditolak'])->count(),
            'belum' => pendaftaran::where('status', 'pending')->count(),
        ];
        $belumAsesmenCounts = [
            'sd' => Pendaftaran::where('jenjang_sekolah_id', 1)
                        ->whereDoesntHave('asesmen')
                        ->count(),
            'smp' => Pendaftaran::where('jenjang_sekolah_id', 2)
                        ->whereDoesntHave('asesmen')
                        ->count(),
            'sma' => Pendaftaran::where('jenjang_sekolah_id', 3)
                        ->whereDoesntHave('asesmen')
                        ->count(),
            'total' => Pendaftaran::count(),
        ];
        $daftarUlangCounts = [
            'sd' => Pendaftaran::where('jenjang_sekolah_id', 1)
                        ->whereHas('daftarUlang')
                        ->count(),
            'smp' => Pendaftaran::where('jenjang_sekolah_id', 2)
                        ->whereHas('daftarUlang')
                        ->count(),
            'sma' => Pendaftaran::where('jenjang_sekolah_id', 3)
                        ->whereHas('daftarUlang')
                        ->count(),
        ];
        $statusCounts = [
            'diterima' => Pendaftaran::where('status', 'diterima')->count(),
            'ditolak' => Pendaftaran::where('status', 'ditolak')->count(),

        ];

        return view('admin.dashboard_new', compact('pendaftarCounts', 'administrasiCounts', 'daftarUlangCounts', 'belumAsesmenCounts', 'statusCounts'));
    }

    public function users()
    {
        $users = \App\Models\User::whereIn('role', ['guru', 'staff'])->get();
        return view('admin.users', compact('users'));
    }

    public function addUser(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        \App\Models\User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role ?? 'guru'
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

        // Data status pendaftaran
        $dataStatus = Pendaftaran::select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status')
            ->toArray();

        $statuses = ['pending', 'diproses', 'diterima', 'ditolak'];
        $counts = [];
        foreach ($statuses as $status) {
            $counts[$status] = $dataStatus[$status] ?? 0;
        }
        return view('admin.chart', compact('sudahAsesmenL', 'sudahAsesmenP', 'belumAsesmenL', 'belumAsesmenP', 'total_sudah', 'total_belum', 'counts'));
    }

    public function updatePendaftaranStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,diproses,diterima,ditolak'
        ]);

        try {
            $pendaftar = Pendaftaran::findOrFail($id);
            if ($pendaftar->status === $request->status) {
                return back()->with('info', 'Status pendaftaran tidak berubah.');
            }

            \DB::beginTransaction();
            $pendaftar->status = $request->status;
            $pendaftar->save();

            Notifikasi::create([
                'user_id' => $pendaftar->user_id,
                'pesan' => 'Status pendaftaran Anda kini: ' . ucfirst($request->status),
                'status' => 'belum dibaca',
            ]);
            \DB::commit();

            return back()->with('success', 'Status pendaftaran berhasil diperbarui.');
        } catch (\Exception $e) {
            \DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function pendaftar()
    {
        $pendaftar = Pendaftaran::with('user')->get();
        return view('admin.pendaftar', compact('pendaftar'));
    }

    public function destroyPendaftar($id)
    {
        $pendaftar = Pendaftaran::findOrFail($id);
        $pendaftar->orangTua()->delete();
        $pendaftar->daftarUlang()->delete();
        $pendaftar->asesmen()->delete();
        $pendaftar->jadwalAsesmen()->delete();
        $pendaftar->delete();

        return redirect()->route('admin.pendaftar')->with('success', 'Pendaftar berhasil dihapus.');
    }
}
