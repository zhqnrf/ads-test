<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DepartureController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TravelController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing.index');
})->name('home');

Route::get('/destiny', [PageController::class, 'destinationIndex'])->name('destinasi');

Route::get('/cart', [PageController::class, 'checkoutIndex'])->name('cart');

Route::get('/order', [PageController::class, 'orderIndex'])->name('order');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('travels', TravelController::class);
    Route::resource('user', UserController::class);
    Route::resource('destination', DestinationController::class);
    Route::resource('departure', DepartureController::class);

    Route::put('/changerole/{id}', [UserController::class, 'changeRole'])->name('changerole');
    Route::delete('/user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    Route::post('/addtocart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');

    Route::post('/checkout', [CartController::class, 'checkOutAll'])->name('checkout');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
