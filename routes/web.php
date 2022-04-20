<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Http\Request;

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


// Route::get('/', function () {
//     return view('welcome');
// });
Route::resource('mahasiswa', MahasiswaController::class);
Route::get('mahasiswa/nilai/{mahasiswa}', [MahasiswaController::class, 'Mahasiswa_MataKuliah'])->name('mahasiswa.nilai');
Route::get('mahasiswa/nilai/{mahasiswa}/pdf', [MahasiswaController::class, 'cetakNilai_pdf'])->name('mahasiswa.cetakNilai_pdf');