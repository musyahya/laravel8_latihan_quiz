<?php

use App\Http\Controllers\CekRoleController;
use App\Http\Controllers\Guru\DashboardController as GuruDashboard;
use App\Http\Controllers\Guru\KelompokBelajarController;
use App\Http\Controllers\Guru\KelompokBelajarMuridController;
use App\Http\Controllers\Guru\MuridController;
use App\Http\Controllers\Guru\QuizController as GuruQuiz;
use App\Http\Controllers\Guru\SemuaMuridController;
use App\Http\Controllers\Guru\SoalController as GuruSoal;
use App\Http\Controllers\Murid\DashboardController as MuridDashboard;
use App\Http\Controllers\Murid\LihatJawabanController;
use App\Http\Controllers\Murid\QuizController as MuridQuiz;
use App\Http\Controllers\Murid\SoalController as MuridSoal;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
//     return redirect('/login');
// });
Route::get('/asd', function () {
    return view('asd');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', CekRoleController::class);
Route::get('/cekrole', CekRoleController::class);

Route::middleware(['auth','role:guru'])->group(function () {
    Route::get('/dashboard/guru', GuruDashboard::class);
    Route::get('/quiz', GuruQuiz::class);
    Route::get('/soal', GuruSoal::class);
    Route::get('/murid', MuridController::class);
    Route::get('/semua_murid', SemuaMuridController::class);
    Route::get('/kelompok_belajar', KelompokBelajarController::class);
    Route::get('/kelompok_belajar_murid', KelompokBelajarMuridController::class);
});

Route::middleware(['auth','role:murid'])->group(function () {
    Route::get('/dashboard/murid', MuridDashboard::class);
    Route::get('/quiz/murid', MuridQuiz::class);
    Route::get('/soal/murid', MuridSoal::class);
    Route::get('/lihat_jawaban', LihatJawabanController::class);
});