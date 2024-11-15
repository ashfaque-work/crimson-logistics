<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Refiner\RefinerController;
use App\Http\Controllers\Freight\FreightController;
use App\Http\Controllers\Shipper\ShipperController;
use App\Http\Controllers\Client\ClientController;


Route::get('/', function () {
    return redirect('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Conductor 
Route::group(['middleware' => ['auth', 'role:conductor']], function () {

    Route::view('/dashboard', 'pages.dashboard');
    // User Routes
    Route::prefix('users')->name('conductor.users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::post('/update', [UserController::class, 'update'])->name('update');
        Route::post('/delete', [UserController::class, 'delete'])->name('delete');
        Route::get('/status/{id}/{status}', [UserController::class, 'changeUserStatus'])->name('status');
    });

    // Order Routes
    Route::prefix('orders')->name('conductor.orders.')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('/create', [OrderController::class, 'create'])->name('create');
        Route::post('/store', [OrderController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [OrderController::class, 'edit'])->name('edit');
        Route::post('/update', [OrderController::class, 'update'])->name('update');
        Route::post('/delete', [OrderController::class, 'delete'])->name('delete');
        Route::post('/ready-to-receive', [OrderController::class, 'readyToReceive'])->name('readyToReceive');
        Route::get('/ready-to-receive', [OrderController::class, 'viewReadyToReceive'])->name('readyToReceive');
    });

    // product Routes
    Route::prefix('products')->name('conductor.products.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::post('/update', [ProductController::class, 'update'])->name('update');
        Route::post('/delete', [ProductController::class, 'delete'])->name('delete');
    });
});

// Refiners
Route::prefix('refiner')->middleware(['auth', 'role:refiner'])->group(function () {
    Route::get('dashboard', [RefinerController::class, 'index'])->name('refiner.index');
    Route::post('/confirm-order', [RefinerController::class, 'confirmOrder'])->name('refiner.confirmOrder');
});

// Freight
Route::prefix('freight')->middleware(['auth', 'role:freight'])->group(function () {
    Route::get('dashboard', [FreightController::class, 'index'])->name('freight.index');
    //Route::post('/confirm-order', [RefinerController::class, 'confirmOrder'])->name('refiner.confirmOrder');
});

// Shipper
Route::prefix('shipper')->middleware(['auth', 'role:shipper'])->group(function () {
    Route::get('dashboard', [ShipperController::class, 'index'])->name('shipper.index');
    //Route::post('/confirm-order', [RefinerController::class, 'confirmOrder'])->name('refiner.confirmOrder');
});

// Client
Route::prefix('client')->middleware(['auth', 'role:client'])->group(function () {
    Route::get('dashboard', [ClientController::class, 'index'])->name('client.index');
    //Route::post('/confirm-order', [RefinerController::class, 'confirmOrder'])->name('refiner.confirmOrder');
});


require __DIR__ . '/auth.php';
