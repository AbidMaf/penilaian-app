<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\MahasiswaController;

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

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/home', [DashboardController::class, 'index']);
// Route::get('/home', function () {
//     return view('home.index');
// });

Route::get('{kd_matkul}', [NilaiController::class, 'showNilai']);
Route::post('/{kd_matkul}/tambahNilai', [NilaiController::class, 'tambahNilai']);

Route::get('hapusNilai/{id}', [NilaiController::class, 'hapusNilai']);

Route::get('/', [MahasiswaController::class, 'useNPM']);
Route::post('/mahasiswa', [MahasiswaController::class, 'getNPM']);

Route::get('/mahasiswa/{npm}', [MahasiswaController::class, 'getDataNilaiMahasiswa']);
