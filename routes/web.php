<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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


Route::get('/', [HomeController::class, 'index']);
Route::post('/infor', [HomeController::class, 'infor'])->name('infor');
Route::get('/order', [HomeController::class, 'order'])->name('order');

Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin');