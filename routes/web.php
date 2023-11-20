<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MenuController;

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

// controller of home
Route::prefix('')->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::post('/infor', [HomeController::class, 'infor'])->name('infor');
    Route::get('/order', [HomeController::class, 'order'])->name('order');
});

// controller of admin
Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin');

// controller of menus
Route::prefix('menus')->group(function () {
    Route::get('/', [MenuController::class, 'index'])->name('menu');
    Route::get('/create', [MenuController::class, 'create'])->name('create');
    Route::post('/store', [MenuController::class, 'store'])->name('store');
    Route::get('/{id}', [MenuController::class, 'show'])->name('show');
    Route::get('{id}/edit', [MenuController::class, 'edit'])->name('edit');
    Route::put('/update', [MenuController::class, 'update'])->name('update');
    Route::delete('/{id}', [MenuController::class, 'destroy'])->name('destroy');
});
