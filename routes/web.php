<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\LazProductController;
use App\Http\Controllers\LazTrxController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/news', function () {
    return Inertia::render('Front/Index');
});
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    Route::resource('chirps', ChirpController::class)
        ->only(['index', 'store', 'create', 'update', 'destroy'])
        ->middleware(['auth', 'verified']);
    Route::get('/laz_transaction', [LazTrxController::class, 'index'])->name('laztrx.index');
    Route::post('/laz_transaction', [LazTrxController::class, 'import'])->name('laztrx.import');
    Route::get('/laz_transaction/edit', [LazTrxController::class, 'edit'])->name('laztrx.edit');
    Route::delete('/laz_transaction', [LazTrxController::class, 'destroy'])->name('laztrx.destroy');

    Route::post('/laz_product/update', [LazProductController::class, 'editPrice'])->name('lazproduct.update');
});
