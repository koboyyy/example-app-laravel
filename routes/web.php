<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\ProdiController;

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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [HomeController::class, 'index'])
->middleware(['auth'])
->name('dashboard');

// Mahasiswa
Route::get('/admin/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::get('/admin/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
Route::post('/admin/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
Route::get('/admin/mahasiswa/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
Route::put('/admin/mahasiswa/update', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
Route::delete('/admin/mahasiswa/delete', [MahasiswaController::class, 'delete'])->name('mahasiswa.delete');

// Jurusan
Route::get('/admin/jurusan', [JurusanController::class, 'index'])->name('jurusan.index');
Route::get('/admin/jurusan/create', [JurusanController::class, 'create'])->name('jurusan.create');
Route::post('admin/jurusan/store', [JurusanController::class, 'store'])->name('jurusan.store');
Route::get('admin/jurusan/edit', [JurusanController::class, 'edit'])->name('jurusan.edit');
Route::put('admin/jurusan/update', [JurusanController::class, 'update'])->name('jurusan.update');
Route::delete('admin/jurusan/delete', [JurusanController::class, 'delete'])->name('jurusan.delete');

// Prodi
Route::get('/admin/prodi', [ProdiController::class, 'index'])->name('prodi.index');
Route::get('/admin/prodi/create', [ProdiController::class, 'create'])->name('prodi.create');
Route::post('/admin/prodi', [ProdiController::class, 'store'])->name('prodi.store');
Route::get('/admin/prodi/edit', [ProdiController::class, 'edit'])->name('prodi.edit');
Route::put('/admin/prodi/update', [ProdiController::class, 'update'])->name('prodi.update');
Route::delete('/admin/prodi/delete', [ProdiController::class, 'delete'])->name('prodi.delete');