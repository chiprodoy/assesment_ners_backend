<?php

use App\Http\Controllers\KompetensiController;
use App\Http\Controllers\SubKompetensiController;
use Illuminate\Support\Facades\Route;

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
    return ['Laravel' => app()->version()];
});

Route::get('/kompetensi/create', [KompetensiController::class, 'create'])
                ->name('kompetensi.create');

Route::post('/kompetensi', [KompetensiController::class, 'store'])
                ->name('kompetensi.store');

Route::get('/kompetensi/seed', [KompetensiController::class, 'seed'])
                ->name('kompetensi.seed');

Route::get('/subkompetensi/create', [SubKompetensiController::class, 'create'])
                ->name('subkompetensi.create');

Route::get('/subkompetensi/edit/{uuid?}', [SubKompetensiController::class, 'edit'])
                ->name('subkompetensi.edit');

Route::post('/subkompetensi', [SubKompetensiController::class, 'store'])
                ->name('subkompetensi.store');

Route::delete('/subkompetensi/delete/{uuid?}', [SubKompetensiController::class, 'destroy'])
                ->name('subkompetensi.destroy');

Route::post('/subkompetensi/{uuid}', [SubKompetensiController::class, 'update'])
                ->name('subkompetensi.update');

Route::get('/subkompetensi/seed', [SubKompetensiController::class, 'seed'])
                ->name('subkompetensi.seed');

require __DIR__.'/auth.php';
