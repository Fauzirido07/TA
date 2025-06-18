<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController, PendaftaranController, AsesmenController, JadwalController,
    HasilController, NotifikasiController, AdminController, ProsedurController,
    PendaftarController
};

// Halaman utama
Route::get('/', fn() => view('landing'))->name('home');

// Autentikasi
Route::view('/login', 'login')->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::view('/register', 'daftar')->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ===================================================
// ==================== ADMIN =======================
// ===================================================
Route::middleware(['auth', 'role:staff'])->group(function () {
    // Dashboard Admin
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Manajemen User
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::post('/admin/users/update-role', [AdminController::class, 'updateRole'])->name('admin.updateRole');
    Route::post('/admin/users/delete/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');

    // Tambah Guru
    Route::get('/admin/users/add', [AdminController::class, 'createUser'])->name('admin.users.create');
    Route::post('/admin/users/add', [AdminController::class, 'addUser'])->name('admin.users.add');

    
    // Manajemen Prosedur
    Route::get('/prosedurs', [ProsedurController::class, 'adminIndex'])->name('admin.prosedur');
    Route::post('/prosedur', [ProsedurController::class, 'store'])->name('admin.prosedur.store');
    Route::get('/prosedur/edit/{id}', [ProsedurController::class, 'edit'])->name('admin.prosedur.edit');
    Route::post('/prosedur/update/{id}', [ProsedurController::class, 'update'])->name('admin.prosedur.update');
    Route::post('/prosedur/delete/{id}', [ProsedurController::class, 'destroy'])->name('admin.prosedur.destroy');


    // Manajemen Jadwal
    Route::prefix('admin')->group(function () {
    Route::get('/jadwal', [JadwalController::class, 'adminIndex'])->name('admin.jadwal');
    Route::get('/jadwal/create', [JadwalController::class, 'create'])->name('admin.jadwal.create');
    Route::post('/jadwal/store', [JadwalController::class, 'store'])->name('admin.jadwal.store');
    Route::get('/jadwal/edit/{id}', [JadwalController::class, 'edit'])->name('admin.jadwal.edit');
    Route::post('/jadwal/update/{id}', [JadwalController::class, 'update'])->name('admin.jadwal.update');
    Route::post('/jadwal/delete/{id}', [JadwalController::class, 'destroy'])->name('admin.jadwal.destroy');
    });

    // Chart
    Route::get('/admin/chart', [\App\Http\Controllers\AdminController::class, 'chart'])->name('admin.chart');

});


// ===================================================
// ==================== GURU =========================
// ===================================================
Route::middleware(['auth', 'role:guru'])->group(function () {
    // Dashboard Guru
    Route::get('/guru/dashboard', [\App\Http\Controllers\GuruController::class, 'dashboard'])->name('guru.dashboard');
    
    // Form Asesmen
    Route::get('/asesmen', [AsesmenController::class, 'index'])->name('asesmen');
    Route::post('/asesmen', [AsesmenController::class, 'store'])->name('asesmen.store');
    Route::get('/guru/asesmen/pilih', [\App\Http\Controllers\GuruController::class, 'pilihSiswa'])->name('guru.asesmen.pilih');
    Route::get('/guru/asesmen/isi/{id}', [\App\Http\Controllers\GuruController::class, 'isiAsesmen'])->name('guru.asesmen.isi');
    Route::get('/guru/asesmen/daftar', [\App\Http\Controllers\GuruController::class, 'daftarAsesmen'])->name('guru.asesmen.daftar');
    Route::get('/guru/asesmen/detail/{id}', [\App\Http\Controllers\GuruController::class, 'detailAsesmen'])->name('guru.asesmen.detail');
});


// ===================================================
// ==================== PENDAFTAR ====================
// ===================================================
Route::middleware(['auth', 'role:pendaftar'])->group(function () {
    // Dashboard Pendaftar
    Route::get('/dashboard', [PendaftarController::class, 'dashboard'])->name('dashboard.pendaftar');

    // Pendaftaran Masuk Sekolah
    Route::get('/daftar', [PendaftaranController::class, 'create'])->name('daftar');
    Route::post('/daftar', [PendaftaranController::class, 'store'])->name('daftar.post');
    Route::get('/pendaftaran-saya', [PendaftaranController::class, 'showMyData'])->name('pendaftaran.saya');

    // Edit Pendaftaran
    Route::get('/pendaftaran-saya/edit', [PendaftaranController::class, 'edit'])->name('pendaftaran.edit');
    Route::post('/pendaftaran-saya/update', [PendaftaranController::class, 'update'])->name('pendaftaran.update');
    Route::get('/pendaftaran-saya/cetak', [PendaftaranController::class, 'cetak'])->name('pendaftaran.cetak');

    // Jadwal Asesmen
    Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal');

    // Hasil Asesmen
    Route::get('/hasil', [HasilController::class, 'index'])->name('hasil');
    Route::get('/hasil/pdf', [HasilController::class, 'exportPdf'])->name('hasil.pdf');

    // Notifikasi
    Route::get('/notifikasi', [NotifikasiController::class, 'index'])->name('notifikasi');

    // Prosedur
    Route::get('/prosedur', [ProsedurController::class, 'showForPendaftar'])->name('prosedur');

});


// ===================================================
// ================== NOTIFIKASI UMUM ================
// ===================================================
Route::middleware('auth')->group(function () {
    Route::get('/notifikasi', [NotifikasiController::class, 'index'])->name('notifikasi');
});


// ================== Laporan (opsional) =============
Route::get('/laporan', [HasilController::class, 'cetakLaporan'])->name('laporan');
