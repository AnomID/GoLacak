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
})->name('welcome'); // Add name here

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
    Route::get('/admin/bulan/create', [BulanController::class, 'create'])->name('admin.bulan.create');
    Route::get('/admin/bulan', [BulanController::class, 'index'])->name('admin.bulan.index');
    Route::get('/admin/bulan/view-all', [BulanController::class, 'viewAll'])->name('admin.bulan.viewAll');
    Route::get('/admin/bulan/{bulan}', [BulanController::class, 'tampil'])->name('admin.bulan.tampil');
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

    // Sub-Kegiatan routes for admin
    Route::get('/admin/kegiatan/{kegiatan}/sub-kegiatan', [SubKegiatanController::class, 'index'])->name('subkegiatan.index');
    Route::get('/admin/kegiatan/{kegiatan}/sub-kegiatan/create', [SubKegiatanController::class, 'create'])->name('subkegiatan.create');
    Route::post('/admin/kegiatan/{kegiatan}/sub-kegiatan', [SubKegiatanController::class, 'store'])->name('subkegiatan.store');
    Route::get('/admin/sub-kegiatan/{subKegiatan}/edit', [SubKegiatanController::class, 'edit'])->name('subkegiatan.edit');
    Route::put('/admin/sub-kegiatan/{subKegiatan}', [SubKegiatanController::class, 'update'])->name('subkegiatan.update');
    Route::delete('/admin/sub-kegiatan/{subKegiatan}', [SubKegiatanController::class, 'destroy'])->name('subkegiatan.destroy');
});

// Rute yang bisa diakses oleh User untuk melihat dan mengedit anggaran
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/bulan', [BulanController::class, 'userBulanIndex'])->name('user.bulan.index');
    Route::get('/user/bulan/view-all', [BulanController::class, 'viewAll'])->name('user.bulan.viewAll');
    Route::get('/user/bulan/{bulan}', [BulanController::class, 'tampil'])->name('user.bulan.tampil');

    // User dapat melihat daftar program di bulan tertentu
    Route::get('/user/program/{bulan}', [ProgramController::class, 'userProgramIndex'])->name('user.program.index');

    // User mengedit anggaran program
    Route::get('/user/program/{program}/edit-anggaran', [ProgramController::class, 'editAnggaran'])->name('user.program.edit-anggaran');
    Route::patch('/user/program/{program}/update-anggaran', [ProgramController::class, 'updateAnggaran'])->name('user.program.update-anggaran');

    // User dapat melihat daftar kegiatan di program tertentu
    Route::get('/user/kegiatan/program/{program}', [KegiatanController::class, 'userKegiatanIndex'])->name('user.kegiatan.index');

    // User mengedit anggaran kegiatan
    Route::get('/user/kegiatan/{kegiatan}/edit-anggaran', [KegiatanController::class, 'editAnggaran'])->name('user.kegiatan.edit-anggaran');
    Route::patch('/user/kegiatan/{kegiatan}/update-anggaran', [KegiatanController::class, 'updateAnggaran'])->name('user.kegiatan.update-anggaran');

    // User dapat melihat daftar sub-kegiatan di kegiatan tertentu
    Route::get('/user/sub-kegiatan/kegiatan/{kegiatan}', [SubKegiatanController::class, 'userSubKegiatanIndex'])->name('user.subkegiatan.index');
    // User mengedit anggaran sub-kegiatan
    Route::get('/user/sub-kegiatan/{subKegiatan}/edit-anggaran', [SubKegiatanController::class, 'editAnggaran'])->name('user.subkegiatan.edit-anggaran');
    Route::patch('/user/sub-kegiatan/{subKegiatan}/update-anggaran', [SubKegiatanController::class, 'updateAnggaran'])->name('user.subkegiatan.update-anggaran');
});

// Autentikasi (login, register, dll.)
require __DIR__.'/auth.php';
