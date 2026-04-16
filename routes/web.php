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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', [HomeController::class, 'index'])
->middleware(['auth'])
->name('dashboard');
Route::get('/admin/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::get('/admin/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
Route::post('/admin/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
Route::get('/admin/jurusan', [JurusanController::class, 'index']);
Route::get('/admin/jurusan/create', [JurusanController::class, 'create'])->name('jurusan.create');
Route::get('/admin/prodi', [ProdiController::class, 'index']);

Route::post('admin/mahasiswa/store', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
Route::post('admin/jurusan/store', [JurusanController::class, 'store'])->name('jurusan.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';