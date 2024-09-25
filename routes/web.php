<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BulanController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\SubKegiatanController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Halaman Utama (Welcome)
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Route untuk user yang sudah login
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard umum
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    
    // Rute untuk Profil Pengguna
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Bulan routes for admin
    Route::get('/admin/bulan', [BulanController::class, 'index'])->name('admin.bulan.index');
    Route::get('/admin/bulan/create', [BulanController::class, 'create'])->name('admin.bulan.create');
    Route::post('/admin/bulan', [BulanController::class, 'store'])->name('admin.bulan.store');
    Route::get('/admin/bulan/{bulan}/edit', [BulanController::class, 'edit'])->name('admin.bulan.edit');
    Route::put('/admin/bulan/{bulan}', [BulanController::class, 'update'])->name('admin.bulan.update');
    Route::delete('/admin/bulan/{bulan}', [BulanController::class, 'destroy'])->name('admin.bulan.destroy');

    // Program routes for admin
    Route::get('/admin/bulan/{bulan}/programs', [ProgramController::class, 'index'])->name('program.index');
    Route::get('/admin/bulan/{bulan}/programs/create', [ProgramController::class, 'create'])->name('program.create');
    Route::post('/admin/bulan/{bulan}/programs', [ProgramController::class, 'store'])->name('program.store');
    Route::get('/admin/programs/{program}/edit', [ProgramController::class, 'edit'])->name('program.edit');
    Route::put('/admin/programs/{program}', [ProgramController::class, 'update'])->name('program.update');
    Route::delete('/admin/programs/{program}', [ProgramController::class, 'destroy'])->name('program.destroy');

    // Kegiatan routes for admin
    Route::get('/admin/program/{program}/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');
    Route::get('/admin/program/{program}/kegiatan/create', [KegiatanController::class, 'create'])->name('kegiatan.create');
    Route::post('/admin/program/{program}/kegiatan', [KegiatanController::class, 'store'])->name('kegiatan.store');
    Route::get('/admin/kegiatan/{kegiatan}/edit', [KegiatanController::class, 'edit'])->name('kegiatan.edit');
    Route::put('/admin/kegiatan/{kegiatan}', [KegiatanController::class, 'update'])->name('kegiatan.update');
    Route::delete('/admin/kegiatan/{kegiatan}', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy');

    // // Sub-Kegiatan routes for admin
    // Route::get('/admin/kegiatan/{kegiatan}/sub-kegiatan', [SubKegiatanController::class, 'index'])->name('subkegiatan.index');
    // Route::get('/admin/kegiatan/{kegiatan}/sub-kegiatan/create', [SubKegiatanController::class, 'create'])->name('subkegiatan.create');
    // Route::post('/admin/kegiatan/{kegiatan}/sub-kegiatan', [SubKegiatanController::class, 'store'])->name('subkegiatan.store');
    // Route::get('/admin/sub-kegiatan/{subkegiatan}/edit', [SubKegiatanController::class, 'edit'])->name('subkegiatan.edit');
    // Route::put('/admin/sub-kegiatan/{subkegiatan}', [SubKegiatanController::class, 'update'])->name('subkegiatan.update');
    // Route::delete('/admin/sub-kegiatan/{subkegiatan}', [SubKegiatanController::class, 'destroy'])->name('subkegiatan.destroy');

    // Sub-Kegiatan routes for admin
    Route::get('/admin/kegiatan/{kegiatan}/sub-kegiatan', [SubKegiatanController::class, 'index'])->name('subkegiatan.index');
    Route::get('/admin/kegiatan/{kegiatan}/sub-kegiatan/create', [SubKegiatanController::class, 'create'])->name('subkegiatan.create');
    Route::post('/admin/kegiatan/{kegiatan}/sub-kegiatan', [SubKegiatanController::class, 'store'])->name('subkegiatan.store');
    Route::get('/admin/sub-kegiatan/{subKegiatan}/edit', [SubKegiatanController::class, 'edit'])->name('subkegiatan.edit');
    Route::put('/admin/sub-kegiatan/{subKegiatan}', [SubKegiatanController::class, 'update'])->name('subkegiatan.update');
    Route::delete('/admin/sub-kegiatan/{subKegiatan}', [SubKegiatanController::class, 'destroy'])->name('subkegiatan.destroy');
    
    // Route::get('/admin/kegiatan/{kegiatan}/sub-kegiatan', [SubKegiatanController::class, 'index'])->name('subkegiatan.index');
    // Route::get('/admin/kegiatan/{kegiatan}/sub-kegiatan/create', [SubKegiatanController::class, 'create'])->name('subkegiatan.create');
    // Route::post('/admin/kegiatan/{kegiatan}/sub-kegiatan', [SubKegiatanController::class, 'store'])->name('subkegiatan.store');
    // Route::get('/admin/kegiatan/{kegiatan}/sub-kegiatan/{subkegiatan}/edit', [SubKegiatanController::class, 'edit'])->name('subkegiatan.edit');
    // Route::put('/admin/kegiatan/{kegiatan}/sub-kegiatan/{subkegiatan}', [SubKegiatanController::class, 'update'])->name('subkegiatan.update');
    // Route::delete('/admin/kegiatan/{kegiatan}/sub-kegiatan/{subkegiatan}', [SubKegiatanController::class, 'destroy'])->name('subkegiatan.destroy');

});

// Rute yang bisa diakses oleh User untuk melihat dan mengedit anggaran
Route::middleware(['auth', 'role:user'])->group(function () {
    // User dapat melihat daftar bulan
    Route::get('/user/bulan', [BulanController::class, 'userBulanIndex'])->name('user.bulan.index');

    // User dapat melihat daftar program di bulan tertentu
    Route::get('/user/program/{bulan}', [ProgramController::class, 'userProgramIndex'])->name('user.program.index');

    // User mengedit anggaran program
    Route::patch('/user/program/{program}/update-anggaran', [ProgramController::class, 'updateAnggaran'])->name('user.program.update-anggaran');

    // User dapat melihat daftar kegiatan di program tertentu
    Route::get('/user/kegiatan/program/{program}', [KegiatanController::class, 'userKegiatanIndex'])->name('user.kegiatan.index');

    // User mengedit anggaran kegiatan
    Route::patch('/user/kegiatan/{kegiatan}/update-anggaran', [KegiatanController::class, 'updateAnggaran'])->name('user.kegiatan.update-anggaran');

    // User dapat melihat daftar sub-kegiatan di kegiatan tertentu
    Route::get('/user/sub-kegiatan/kegiatan/{kegiatan}', [SubKegiatanController::class, 'userSubKegiatanIndex'])->name('user.subkegiatan.index');

    // User mengedit anggaran sub-kegiatan
    Route::patch('/user/sub-kegiatan/{subkegiatan}/update-anggaran', [SubKegiatanController::class, 'updateAnggaran'])->name('user.subkegiatan.update-anggaran');
});

// Autentikasi (login, register, dll.)
require __DIR__.'/auth.php';
