<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BulanController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\SubKegiatanController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::prefix('bulan')->group(function () {
//     Route::get('/', [BulanController::class, 'index']); // Get all records
//     Route::post('/', [BulanController::class, 'store']); // Create a new record
//     Route::get('/{id}', [BulanController::class, 'show']); // Get a specific record
//     Route::put('/{id}', [BulanController::class, 'update']); // Update a record
//     Route::delete('/{id}', [BulanController::class, 'destroy']); // Delete a record
// });

// Route::prefix('program')->group(function () {
//     Route::get('/', [ProgramController::class, 'index']); // Get all records
//     Route::post('/', [ProgramController::class, 'store']); // Create a new record
//     Route::get('/{id}', [ProgramController::class, 'show']); // Get a specific record
//     Route::put('/{id}', [ProgramController::class, 'update']); // Update a record
//     Route::delete('/{id}', [ProgramController::class, 'destroy']); // Delete a record
// });


// Route::prefix('kegiatan')->group(function () {
//     Route::get('/', [KegiatanController::class, 'index']); // Get all records
//     Route::post('/', [KegiatanController::class, 'store']); // Create a new record
//     Route::get('/{id}', [KegiatanController::class, 'show']); // Get a specific record
//     Route::put('/{id}', [KegiatanController::class, 'update']); // Update a record
//     Route::delete('/{id}', [KegiatanController::class, 'destroy']); // Delete a record
// });

// Route::prefix('sub_kegiatan')->group(function () {
//     Route::get('/', [SubKegiatanController::class, 'index']); // Get all records
//     Route::post('/', [SubKegiatanController::class, 'store']); // Create a new record
//     Route::get('/{id}', [SubKegiatanController::class, 'show']); // Get a specific record
//     Route::put('/{id}', [SubKegiatanController::class, 'update']); // Update a record
//     Route::delete('/{id}', [SubKegiatanController::class, 'destroy']); // Delete a record
// });



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
