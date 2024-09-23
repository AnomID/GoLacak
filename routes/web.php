<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\BulanController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\SubKegiatanController;

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

// Rute untuk Dashboard Umum (Hanya Pengguna Terautentikasi)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    
    // Rute untuk Profil Pengguna
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute untuk Logout
Route::post('/logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Rute yang hanya bisa diakses oleh User
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user', function () {
        return Inertia::render('UserDashboard');
    })->name('user.dashboard');
});

// Rute yang hanya bisa diakses oleh Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Rute untuk Bulan
    Route::resource('bulan', BulanController::class)->names([
    'index' => 'admin.bulan', // Menggunakan nama rute admin.bulan untuk index
    ]);

    // Rute untuk Program
    Route::get('program/{bulan}', [ProgramController::class, 'index'])->name('program.index');
    Route::get('program/create/{bulan}', [ProgramController::class, 'create'])->name('program.create');
    Route::post('program', [ProgramController::class, 'store'])->name('program.store');
    Route::get('program/{program}/edit', [ProgramController::class, 'edit'])->name('program.edit');
    Route::put('program/{program}', [ProgramController::class, 'update'])->name('program.update');
    Route::delete('program/{program}', [ProgramController::class, 'destroy'])->name('program.destroy');

    // Rute untuk Kegiatan
    Route::get('kegiatan/program/{program}', [KegiatanController::class, 'index'])->name('kegiatan.index');
    Route::get('kegiatan/create/{program}', [KegiatanController::class, 'create'])->name('kegiatan.create');
    Route::post('kegiatan', [KegiatanController::class, 'store'])->name('kegiatan.store');
    Route::get('kegiatan/{kegiatan}/edit', [KegiatanController::class, 'edit'])->name('kegiatan.edit');
    Route::put('kegiatan/{kegiatan}', [KegiatanController::class, 'update'])->name('kegiatan.update');
    Route::delete('kegiatan/{kegiatan}', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy');

    // Rute untuk Sub-Kegiatan
    Route::get('sub-kegiatan/kegiatan/{kegiatan}', [SubKegiatanController::class, 'index'])->name('subkegiatan.index');
    Route::get('sub-kegiatan/create/{kegiatan}', [SubKegiatanController::class, 'create'])->name('subkegiatan.create');
    Route::post('sub-kegiatan', [SubKegiatanController::class, 'store'])->name('subkegiatan.store');
    Route::get('sub-kegiatan/{subkegiatan}/edit', [SubKegiatanController::class, 'edit'])->name('subkegiatan.edit');
    Route::put('sub-kegiatan/{subkegiatan}', [SubKegiatanController::class, 'update'])->name('subkegiatan.update');
    Route::delete('sub-kegiatan/{subkegiatan}', [SubKegiatanController::class, 'destroy'])->name('subkegiatan.destroy');
});

// Autentikasi
require __DIR__.'/auth.php';
