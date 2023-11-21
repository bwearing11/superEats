<?php

use App\Http\Controllers\DishController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\RestaurantDetailController;
use App\Http\Controllers\ApprovalsController;
use App\Http\Controllers\PopularDishesController;
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

 // Root route
Route::get('/', [RestaurantController::class, 'index'])->name('restaurantList');


/* -----------------------------------Dishes Routes------------------------------------------------ */

Route::middleware(['auth', 'restaurant'])->group(function () {
    Route::get('/dishes/create', [DishController::class, 'create'])->name('dishes.create');
    Route::get('/dishes/{id}/edit', [DishController::class, 'edit'])->name('dishes.editDish');
    Route::put('/dishes/{id}', [DishController::class, 'update'])->name('dishes.update');

    //Check if they are approved before letting them add/delete
    Route::middleware(['auth', 'restaurantApproval'])->group(function () {
        Route::put('/dishes', [DishController::class, 'store'])->name('dishes.store');
        Route::delete('/dishes/{id}', [DishController::class, 'destroy'])->name('dishes.destroy');
    });
});

Route::get('/dish/{id}', [DishController::class, 'show'])->name('dish.detail');

/* -----------------------------------Restaurant Routes------------------------------------------------ */

//Accessible by anyone
Route::get('/restaurantDetail/{id}', [RestaurantDetailController::class, 'show'])->name('restaurants.show');
Route::get('/dashboard', [RestaurantController::class, 'index'])->name('restaurantList');
Route::get('/restaurantList', [RestaurantController::class, 'index'])->name('restaurantList');
Route::get('/popularDishes', [PopularDishesController::class, 'index'])->name('popularDishes');

/* -----------------------------------Profile Routes - not used------------------------------------------------ */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*--------------------------------------------Cart Routes------------------------------------------------*/

//Only accessible by customers
Route::middleware(['auth', 'customer'])->group(function () {
    Route::post('/addToCart/{dish}', [CartController::class, 'addToCart'])->name('addToCart');
    Route::get('/emptyCart/{id}', [RestaurantDetailController::class, 'emptyCart'])->name('emptyCart');
    Route::get('/checkout/{id}', [RestaurantDetailController::class, 'checkout'])->name('checkoutCart');
});


/*--------------------------------------------Approvals------------------------------------------------*/

//Only accessible by administrators
Route::middleware(['auth', 'administrator'])->group(function () {
    Route::get('/approvals', [ApprovalsController::class, 'GetUnapproved'])->name('approvals');
    Route::post('/approveRestaurant/{id}', [ApprovalsController::class, 'approveRestaurant'])->name('approveRestaurant');
    Route::post('/unapproveRestaurant/{id}', [ApprovalsController::class, 'unapproveRestaurant'])->name('unapproveRestaurant');
});
/*--------------------------------------------List of Orders------------------------------------------------*/

//Only accessible by restaurants
Route::middleware(['auth', 'restaurant'])->group(function () {
    Route::get('/restaurants/{id}/orders', [OrderController::class, 'index'])->name('restaurant.orders');
});

require __DIR__ . '/auth.php';
