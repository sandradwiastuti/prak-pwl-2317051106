<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\ProfilController;

Route::get('/', function () {
    return view('welcome');
});

// ROUTE USER PAKAI UUID
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::get('/user/{uuid}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{uuid}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/{uuid}', [UserController::class, 'destroy'])->name('user.destroy');

// ROUTE MATAKULIAH
Route::get('/matakuliah', [MataKuliahController::class, 'index']);
Route::get('/matakuliah/create', [MataKuliahController::class, 'create'])->name('matakuliah.create');
Route::post('/matakuliah', [MataKuliahController::class, 'store'])->name('matakuliah.store');
Route::get('/matakuliah/{id}/edit', [MataKuliahController::class, 'edit'])->name('matakuliah.edit');
Route::put('/matakuliah/{id}', [MataKuliahController::class, 'update'])->name('matakuliah.update');
Route::delete('/matakuliah/{id}', [MataKuliahController::class, 'destroy'])->name('matakuliah.destroy');

// ROUTE PROFIL
Route::get('/profil/{nama}/{npm}/{kelas}', [ProfilController::class, 'index']);
