<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\WarehousesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderMenuController;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\SeatingController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\MaintenanceCostController;
use App\Http\Controllers\PaymentTypeController;

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
Route::get('/', [HomeController::class, 'index'])->name('pages');
Route::post('/booktable', [BookingController::class, 'bookTable'])->name('book.table');

Route::post('/send-feedback', [FeedbackController::class, 'sendFeedback'])->name('send.feedback');

// controller of home
Route::prefix('qr')->group(function () {
    Route::get('/{table}', [HomeController::class, 'home']);
    Route::post('/infor', [HomeController::class, 'infor'])->name('infor');
    Route::get('/{table}/order', [HomeController::class, 'order'])->name('order');
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');
    Route::get('/{table}/get-menu/{option}', [HomeController::class, 'getMenu'])->name('getmenu');
});

Route::middleware(['auth'])->group(function () {
    // controller of role admin
    Route::prefix('/admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admins');

        Route::get('/dashboards', [HomeController::class, 'dashboards'])->name('dashboards');

        Route::prefix('/order')->group(function () {
            Route::get('/', [OrderController::class, 'index'])->name('order.list');
            Route::get('/{id}', [OrderController::class, 'show'])->name('order.show');
            Route::delete('/{id}', [OrderController::class, 'destroy'])->name('order.destroy');
            Route::post('/store', [OrderController::class, 'store']);
            Route::delete('/', [OrderController::class, 'remove']);
        });

        Route::prefix('/payment')->group(function () {
            Route::get('/', [PaymentTypeController::class, 'paymentList'])->name('payment.list');
            Route::get('/create', [PaymentTypeController::class, 'create'])->name('payment.create');
            Route::post('/store', [PaymentTypeController::class, 'store'])->name('payment.store');
            Route::get('{id}/edit', [PaymentTypeController::class, 'edit'])->name('payment.edit');
            Route::put('/update', [PaymentTypeController::class, 'update'])->name('payment.update');
            Route::delete('/{id}', [PaymentTypeController::class, 'destroy'])->name('payment.destroy');
            Route::post('/update-payment', [OrderController::class, 'updatePayment'])->name('update.payment');
        });
        
        Route::prefix('/profile')->group(function () {
            Route::get('/', [AdminController::class, 'profile'])->name('profile');
            Route::get('/list_users', [AdminController::class, 'listUsers'])->name('list.users');
            Route::post('/edit_profile', [AdminController::class, 'editProfile'])->name('edit.profile');
            Route::post('/change_password', [AdminController::class, 'changePassword'])->name('change.password');
        });
        
        Route::prefix('/seating')->group(function () {
            Route::get('/', [SeatingController::class, 'index'])->name('seatings');
            Route::get('/seating-manager', [SeatingController::class, 'seatingManager'])->name('seating.manager');
            Route::get('/create', [SeatingController::class, 'create'])->name('seating.create');
            Route::post('/store', [SeatingController::class, 'store'])->name('seating.store');
            Route::get('{id}/edit', [SeatingController::class, 'edit'])->name('seating.edit');
            Route::put('/update', [SeatingController::class, 'update'])->name('seating.update');
            Route::delete('/{id}', [SeatingController::class, 'destroy'])->name('seating.destroy');
            Route::post('/update-checkbox', [BookingController::class, 'updateCheckbox'])->name('update.checkbox');
            Route::post('/update-table', [BookingController::class, 'updateTable'])->name('update.table');
        });

        Route::prefix('/bills')->group(function () {
            Route::get('/', [BillController::class, 'index'])->name('bills.list');
            Route::post('/store', [BillController::class, 'store'])->name('bills.store');
            Route::get('/{id}', [BillController::class, 'show'])->name('bills.show');
            Route::get('/{id}/print', [BillController::class, 'print'])->name('bills.print');
            Route::get('{id}/payment', [BillController::class, 'payment'])->name('bills.payment');
            Route::put('/update', [BillController::class, 'update'])->name('bills.update');
            Route::delete('/{id}', [BillController::class, 'destroy'])->name('bills.destroy');
        });
    
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
    });

    Route::prefix('/warehouse')->group(function () {
        Route::get('/', [WarehousesController::class, 'warehouses'])->name('warehouses');
        Route::get('/export', [WarehousesController::class, 'export'])->name('warehouses.export');
        Route::get('/export-input', [WarehousesController::class, 'exportInput'])->name('warehouses.export.input');
        Route::get('/export-output', [WarehousesController::class, 'exportOutput'])->name('warehouses.export.output');
        Route::post('/import-input', [WarehousesController::class, 'import'])->name('warehouses.import.input');
        Route::post('/import-output', [WarehousesController::class, 'importOutput'])->name('warehouses.import.output');
        Route::get('/create', [WarehousesController::class, 'create'])->name('warehouses.create');
        Route::get('/create-output', [WarehousesController::class, 'createOutput'])->name('warehouses.output.create');
        Route::post('/store', [WarehousesController::class, 'store'])->name('warehouses.store');
        Route::get('{id}/edit/{type}', [WarehousesController::class, 'edit'])->name('warehouses.edit');
        Route::put('/update', [WarehousesController::class, 'update'])->name('warehouses.update');
        Route::delete('/{id}/{type}', [WarehousesController::class, 'destroy'])->name('warehouses.destroy');
        Route::get('/export-list', [WarehousesController::class, 'exportList'])->name('warehouses.export.list');
        Route::get('/import-list', [WarehousesController::class, 'importlist'])->name('warehouses.import.list');
    });
    
    Route::prefix('orderMenus')->group(function () {
        Route::delete('/{id}/{orderId}', [OrderMenuController::class, 'destroy'])->name('orderMenus.destroy');
    });

    Route::prefix('/revenue')->group(function () {
        Route::get('/', [RevenueController::class, 'index'])->name('revenues');
        Route::get('/revenue-list', [RevenueController::class, 'revenueList'])->name('revenue.list');
        Route::get('/maintenance-cost', [MaintenanceCostController::class, 'index'])->name('maintenance.cost');
        Route::get('/maintenance-cost/create', [MaintenanceCostController::class, 'create'])
            ->name('maintenance.cost.create');
        Route::post('/maintenance-cost', [MaintenanceCostController::class, 'store'])->name('maintenance.cost.store');
        Route::get('/maintenance-cost/export', [MaintenanceCostController::class, 'export'])
            ->name('maintenance.cost.export');
        Route::post('/maintenance-cost/import', [MaintenanceCostController::class, 'import'])
            ->name('maintenance.cost.import');
        Route::get('{id}/edit', [MaintenanceCostController::class, 'edit'])->name('maintenance.cost.edit');
        Route::put('/update', [MaintenanceCostController::class, 'update'])->name('maintenance.cost.update');
        Route::delete('/{id}', [MaintenanceCostController::class, 'destroy'])->name('maintenance.cost.destroy');
        Route::get('/food-cost', [MaintenanceCostController::class, 'foodCost'])->name('food.cost');
    });
});

Route::fallback(function () {
    return view('errors.404');
});

require __DIR__.'/auth.php';