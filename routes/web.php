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

Route::get('/subkompetensi/create', [SubKompetensiController::class, 'create'])
                ->name('subkompetensi.create');

require __DIR__.'/auth.php';
