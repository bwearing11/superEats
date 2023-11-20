<?php

use App\Http\Controllers\DishController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\RestaurantDetailController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider and all of them will
 * | be assigned to the "web" middleware group. Make something great!
 * |
 */

Route::get('/', [RestaurantController::class, 'index'])->name('restaurantList');
/* -----------------------------------Dishes Routes------------------------------------------------ */
Route::get('/dishes/create', [DishController::class, 'create'])->name('dishes.create');
Route::put('/dishes', [DishController::class, 'store'])->name('dishes.store');
Route::delete('/dishes/{id}', [DishController::class, 'destroy'])->name('dishes.destroy');
Route::get('/dishes/{id}/edit', [DishController::class, 'edit'])->name('dishes.editDish');
Route::put('/dishes/{id}', [DishController::class, 'update'])->name('dishes.update');
Route::get('/dish/{id}', [DishController::class, 'show'])->name('dish.detail');

/* -----------------------------------Restaurant Routes------------------------------------------------ */
Route::get('/restaurantDetail/{id}', [RestaurantDetailController::class, 'show'])->name('restaurants.show');

Route::get('/dashboard', [RestaurantController::class, 'index'])->name('restaurantList');
Route::get('/restaurantList', [RestaurantController::class, 'index'])->name('restaurantList');

Route::get('/restaurantDetails', function () {
    return view('restaurantDetail');
});

/* -----------------------------------Profile Routes - not used------------------------------------------------ */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/* --------------------------------------Orders Routes------------------------------------------------ */
Route::get('/orderList', function () {
    return view('orderList');
});


/*--------------------------------------------Cart Routes------------------------------------------------*/
Route::middleware(['auth'])->group(function () {
    Route::post('/add-to-cart/{dish}', [CartController::class, 'addToCart'])->name('addToCart');
});


Route::get('/restaurants/{id}/orders', [OrderController::class, 'index'])->name('restaurant.orders');
require __DIR__ . '/auth.php';
