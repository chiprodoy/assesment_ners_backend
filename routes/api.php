<?php

use App\Http\Controllers\AsesmenController;
use App\Http\Controllers\AssesmenReportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KompetensiController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\NilaiSubKompetensiController;
use App\Http\Controllers\SubKompetensiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
Route::post('/register', [RegisteredUserController::class, 'store'])
                ->middleware('guest')
                ->name('register');
*/
Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest')
                ->name('login');

Route::get('/matakuliah', [MataKuliahController::class, 'index'])
                ->middleware('auth:sanctum')
                ->name('matakuliah.index');

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])
                ->middleware('auth:sanctum')
                ->name('mahasiswa.index');

Route::post('/mahasiswa', [MahasiswaController::class, 'store'])
                ->middleware('auth:sanctum')
                ->name('mahasiswa.store');

Route::delete('/mahasiswa/{uuid}', [MahasiswaController::class, 'destroy'])
                ->middleware('auth:sanctum')
                ->name('mahasiswa.destroy');

Route::get('/asesmen/{mata_kuliah_uuid}', [AsesmenController::class, 'index'])
                ->middleware('auth:sanctum')
                ->name('asesmen.index');

Route::get('/kompetensi/{asesmen_uuid}', [KompetensiController::class, 'index'])
                ->middleware('auth:sanctum')
                ->name('kompetensi.index');

Route::get('/subkompetensi/{kompetensi_uuid}', [SubKompetensiController::class, 'index'])
                ->middleware('auth:sanctum')
                ->name('subkompetensi.index');

Route::post('/nilai_subkompetensi/{subkompetensi_uuid}', [NilaiSubKompetensiController::class, 'store'])
                ->middleware('auth:sanctum')
                ->name('nilai_subkompetensi.index');

Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth:sanctum')
                ->name('logout');

Route::get('/asesmen_report/{mahasiswa_uuid}/{asesmenid}/{mode?}', [AssesmenReportController::class, 'show'])
               // ->middleware('auth:sanctum')
                ->name('asesmen_report.show');

Route::post('/dosen', [DosenController::class, 'store'])
               // ->middleware('auth:sanctum')
                ->name('dosen.store');
/**
 *
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->middleware('guest')
                ->name('password.email');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
                ->middleware('guest')
                ->name('password.store');
                 */
