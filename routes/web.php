<?php

use App\Http\Controllers\CekRoleController;
use App\Http\Controllers\Guru\DashboardController as GuruDashboard;
use App\Http\Controllers\Guru\KelompokBelajarController;
use App\Http\Controllers\Guru\KelompokBelajarMuridController;
use App\Http\Controllers\Guru\QuizController;
use App\Http\Controllers\Guru\SoalController;
use App\Http\Controllers\Murid\DashboardController as MuridDashboard;
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
// Route::get('/cekrole', CekRoleController::class);

Route::middleware(['auth','role:guru'])->group(function () {
    Route::get('/dashboard/guru', GuruDashboard::class);
    Route::get('/quiz', QuizController::class);
    Route::get('/soal', SoalController::class);
    Route::get('/kelompok_belajar', KelompokBelajarController::class);
    Route::get('/kelompok_belajar_murid', KelompokBelajarMuridController::class);
});

Route::middleware(['auth','role:murid'])->group(function () {
    Route::get('/dashboard/murid', MuridDashboard::class);
});