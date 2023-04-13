<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ChirpController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LazTrxController;
use App\Http\Controllers\LazProductController;
use App\Http\Controllers\PiutangController;
use App\Http\Controllers\PostAdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionCategoryController;

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

// blog
Route::get('/', [PostController::class, 'index']);
Route::get('/blog/{post:slug}', [PostController::class, 'show']);

Route::get('/news', function () {
    return Inertia::render('Front/Index');
});
Route::get('/news/{id}', function () {
    return Inertia::render('Front/Show');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    Route::resource('chirps', ChirpController::class)->only(['index', 'store', 'create', 'update', 'destroy']);
    Route::resource('users', UsersController::class)->only(['index', 'edit', 'destroy'])->middleware('admin');
    Route::get('/laz_transaction', [LazTrxController::class, 'index'])->name('laztrx.index');
    Route::post('/laz_transaction', [LazTrxController::class, 'import'])->name('laztrx.import');
    Route::get('/laz_transaction/edit', [LazTrxController::class, 'edit'])->name('laztrx.edit');
    Route::get('/laz_transaction/{fee_name}', [LazTrxController::class, 'feeName'])->name('laztrx.fee_name');
    Route::delete('/laz_transaction', [LazTrxController::class, 'destroy'])->name('laztrx.destroy');

    Route::post('/laz_product/update', [LazProductController::class, 'editPrice'])->name('lazproduct.update');

    Route::name('extracker.')->prefix('extracker')->group(function () {
        Route::get('transactions', [TransactionController::class, 'index'])->name('transactions.index');
        Route::post('transactions', [TransactionController::class, 'store'])->name('transactions.store');
        Route::delete('transactions/{id}', [TransactionController::class, 'destroy'])->name('transactions.destroy');
        Route::get('transactions/create', [TransactionController::class, 'create'])->name('transactions.create');

        Route::get('categories', [TransactionCategoryController::class, 'index'])->name('categories.index');
        Route::post('categories', [TransactionCategoryController::class, 'store'])->name('categories.store');
        Route::delete('categories/{id}', [TransactionCategoryController::class, 'destroy'])->name('categories.destroy');

        Route::get('piutang', [PiutangController::class, 'index'])->name('piutang.index');
        Route::post('piutang/accept', [PiutangController::class, 'accept'])->name('piutang.accept');
        Route::post('utang/pay', [PiutangController::class, 'pay'])->name('utang.pay');
    });

    Route::get('post-admin', [PostAdminController::class, 'index'])->name('post.index');
    Route::get('post-admin/create', [PostAdminController::class, 'create'])->name('post.create');
    Route::get('post-admin/{id}', [PostAdminController::class, 'edit'])->name('post.edit');
    Route::post('post-admin/', [PostAdminController::class, 'store'])->name('post.store');
    Route::delete('post-admin/{id}', [PostAdminController::class, 'destroy'])->name('post.destroy');
});
