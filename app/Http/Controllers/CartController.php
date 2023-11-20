<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Dish;

class CartController extends Controller
{

    public function addToCart($dishId)
    {
        // Ensure the user is logged in before continuing
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        //Get the logged in customer
        $user = auth()->user();

        // This shouldn't happen but just in case
        if ($user->user_type !== 'customer') {
            return redirect()->back();
        }

        // Retrieve the restaurant id for the dish
        $restaurantId = Dish::find($dishId)->user_id;

        // Retrieve the cart for the current user and restaurant
        $cart = Cart::where('customer_id', $user->id)
                    ->where('restaurant_id', $restaurantId)
                    ->with('dishes')
                    ->first();

        // Create a cart if it doesn't exist for the user and restaurant
        if (!$cart) {
            $cartData = [
                'customer_id' => $user->id,
                'restaurant_id' => $restaurantId,
            ];

            $cart = Cart::create($cartData);
        }

        // Add the dish to the cart
        $cart->dishes()->attach($dishId);

        return redirect()->route('restaurants.show', ['id' => $restaurantId]);
    }



}
