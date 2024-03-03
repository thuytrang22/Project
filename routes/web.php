<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\WarehousesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\NightShiftController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

// controller of page
Route::get('/', [PageController::class, 'index'])->name('pages');
Route::post('/booktable', [BookingController::class, 'bookTable'])->name('book.table');
Route::get('/users/export', [UserController::class, 'export']);
Route::get('/users/import', [UserController::class, 'import']);

// controller of home
Route::prefix('qr')->group(function () {
    Route::get('/{table}', [HomeController::class, 'index']);
    Route::post('/infor', [HomeController::class, 'infor'])->name('infor');
    Route::get('/{table}/order', [HomeController::class, 'order'])->name('order');
    Route::get('/{table}/get-menu/{option}', [HomeController::class, 'getMenu'])->name('getmenu');
});

// controller of admin
Route::prefix('/admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admins');
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');

    Route::get('/orders', [OrderController::class, 'index'])->name('order.list');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('order.show');
    Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('order.destroy');

    // controller of categories
    Route::prefix('/category')->group(function () {
        Route::get('/', [CategoriesController::class, 'index'])->name('categories');
        Route::get('/create', [CategoriesController::class, 'create'])->name('categories.create');
        Route::post('/store', [CategoriesController::class, 'store'])->name('categories.store');
        Route::get('{id}/edit', [CategoriesController::class, 'edit'])->name('categories.edit');
        Route::put('/update', [CategoriesController::class, 'update'])->name('categories.update');
        Route::delete('/{id}', [CategoriesController::class, 'destroy'])->name('categories.destroy');

        // controller of menus
        Route::prefix('/{category}/menu')->group(function () {
            Route::get('/', [MenuController::class, 'index'])->name('category.menus');
            Route::get('/create', [MenuController::class, 'create'])->name('menus.create');
            Route::post('/store', [MenuController::class, 'store'])->name('menus.store');
            Route::get('/{id}', [MenuController::class, 'show'])->name('menus.show');
            Route::get('{id}/edit', [MenuController::class, 'edit'])->name('menus.edit');
            Route::put('/update', [MenuController::class, 'update'])->name('menus.update');
            Route::delete('/{menu}', [MenuController::class, 'destroy'])->name('menus.destroy');
        });
    });

    Route::prefix('/warehouse')->group(function () {
        Route::get('/', [WarehousesController::class, 'warehouses'])->name('warehouses');
        Route::get('/export', [WarehousesController::class, 'export'])->name('warehouses.export');
        Route::get('/export-input', [WarehousesController::class, 'exportInput'])->name('warehouses.export.input');
        Route::get('/export-output', [WarehousesController::class, 'exportOutput'])->name('warehouses.export.output');
        Route::post('/import-input', [WarehousesController::class, 'importInput'])->name('warehouses.import.input');
        Route::post('/import-output', [WarehousesController::class, 'importOutput'])->name('warehouses.import.output');
        Route::get('/create', [WarehousesController::class, 'create'])->name('morning.create');
        Route::post('/store', [WarehousesController::class, 'store'])->name('morning.store');
        Route::get('{id}/edit', [WarehousesController::class, 'edit'])->name('morning.edit');
        Route::put('/update', [WarehousesController::class, 'update'])->name('morning.update');
        Route::delete('/{id}', [WarehousesController::class, 'destroy'])->name('morning.destroy');
        Route::get('/export-list', [WarehousesController::class, 'exportList'])->name('warehouses.export.list');
        Route::get('/import-list', [WarehousesController::class, 'importlist'])->name('warehouses.import.list');
    });
});
    

// controller of cart
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart');
    Route::post('/add/{dish}', [CartController::class, 'add'])->name('add');
    Route::delete('/remove/{id}', [CartController::class, 'remove'])->name('remove');
    Route::delete('/clear', [CartController::class, 'clear'])->name('clear');
});

Route::prefix('order')->group(function () {
    Route::post('/', [OrderController::class, 'store'])->name('order.store');
    Route::delete('/', [OrderController::class, 'remove'])->name('order.remove');
});

Route::get('/export-view', [ExcelController::class, 'showExportView'])->name('export');
Route::get('/import-view', [ExcelController::class, 'showImportView']);
Route::get('/export', [ExcelController::class, 'export']);
Route::post('/import', [ExcelController::class, 'import']);
// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
