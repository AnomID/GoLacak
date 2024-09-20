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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->get('/admin', function () {
    return Inertia::render('AdminDashboard', [
        'user' => auth()->user(),
        'months' => [
            'January', 'February', 'March', 'April', 'May', 'June', 
            'July', 'August', 'September', 'October', 'November', 'December'
        ],
    ]);
})->name('admin.dashboard');

Route::post('/logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');


Route::middleware(['auth', 'role:user'])->get('/user', function () {
    return Inertia::render('UserDashboard');
})->name('user.dashboard');

Route::get('/add-month', function () {
    return Inertia::render('AddMonth');
})->name('add.month');


Route::resource('bulan', BulanController::class);

// Route::resource('program', ProgramController::class);
// Route untuk menampilkan program berdasarkan bulan yang dipilih
// Route::get('program/{bulan}', [ProgramController::class, 'index'])->name('program.index');

// // Route untuk form create program yang dikaitkan dengan bulan tertentu
// Route::get('program/create/{bulan}', [ProgramController::class, 'create'])->name('program.create');

// // Route untuk menyimpan program
// Route::post('program', [ProgramController::class, 'store'])->name('program.store');

// Route::get('program/{id}/edit', [ProgramController::class, 'edit'])->name('program.edit');
// Route::delete('program/{id}', [ProgramController::class, 'destroy'])->name('program.destroy');

// Route untuk edit dan update program tetap bisa menggunakan resource
// Route::resource('program', ProgramController::class)->except(['index', 'create', 'store']);

// Rute untuk Program
Route::get('program/{bulan}', [ProgramController::class, 'index'])->name('program.index');
Route::get('program/create/{bulan}', [ProgramController::class, 'create'])->name('program.create');
Route::post('program', [ProgramController::class, 'store'])->name('program.store');
Route::get('program/{program}/edit', [ProgramController::class, 'edit'])->name('program.edit');
Route::put('program/{program}', [ProgramController::class, 'update'])->name('program.update');
Route::delete('program/{program}', [ProgramController::class, 'destroy'])->name('program.destroy');

// Route::resource('kegiatan', KegiatanController::class);
// Rute untuk Kegiatan
Route::get('kegiatan/program/{program}', [KegiatanController::class, 'index'])->name('kegiatan.index'); // Menampilkan kegiatan berdasarkan program
Route::get('kegiatan/create/{program}', [KegiatanController::class, 'create'])->name('kegiatan.create');
Route::post('kegiatan', [KegiatanController::class, 'store'])->name('kegiatan.store');
Route::get('kegiatan/{kegiatan}/edit', [KegiatanController::class, 'edit'])->name('kegiatan.edit'); // Form untuk edit kegiatan
Route::put('kegiatan/{kegiatan}', [KegiatanController::class, 'update'])->name('kegiatan.update'); // Update kegiatan
Route::delete('kegiatan/{kegiatan}', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy'); // Menghapus kegiatan

// Route::resource('subkegiatan', SubKegiatanController::class);
Route::get('sub-kegiatan/kegiatan/{kegiatan}', [SubKegiatanController::class, 'index'])->name('subkegiatan.index');
Route::get('sub-kegiatan/create/{kegiatan}', [SubKegiatanController::class, 'create'])->name('subkegiatan.create');
Route::post('sub-kegiatan', [SubKegiatanController::class, 'store'])->name('subkegiatan.store');
Route::get('sub-kegiatan/{subkegiatan}/edit', [SubKegiatanController::class, 'edit'])->name('subkegiatan.edit');
Route::put('sub-kegiatan/{subkegiatan}', [SubKegiatanController::class, 'update'])->name('subkegiatan.update');
Route::delete('sub-kegiatan/{subkegiatan}', [SubKegiatanController::class, 'destroy'])->name('subkegiatan.destroy');


require __DIR__.'/auth.php';
