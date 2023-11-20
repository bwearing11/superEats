<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function addToCart($dishId)
    {
        // Ensure the user is logged in
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to add items to the cart.');
        }

        // Ensure the user has the correct user_type
        $user = auth()->user();
        if ($user->user_type !== 'customer') {
            return redirect()->back()->with('error', 'Only customers can add items to the cart.');
        }

        $cart = $user->cart;

        // Create a cart if it doesn't exist for the user
        if (!$cart) {
            $cart = Cart::create(['user_id' => $user->id]);
        }

        // Add the dish to the cart
        $cart->dishes()->attach($dishId);

        return redirect()->back()->with('success', 'Dish added to cart successfully.');
    }
}
