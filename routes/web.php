<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DishesController;
use App\Http\Controllers\DrinksController;

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
Route::get('/', [HomeController::class, 'index']);
Route::post('/infor', [HomeController::class, 'infor'])->name('infor');
Route::get('/order', [HomeController::class, 'order'])->name('order');

// controller of admin
Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin');

// controller of dishes
Route::get('/dishes', [DishesController::class, 'index'])->name('dishes');
Route::get('/dishes/create', [DishesController::class, 'create'])->name('create');
Route::post('/dishes/store', [DishesController::class, 'store'])->name('store');

// controller of drink
Route::get('/drinks', [DrinksController::class, 'index'])->name('drinks');
