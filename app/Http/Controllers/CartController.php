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

        // Ensure the user has the correct user_type
        $user = auth()->user();

        //This shouldn't happen but just in case
        if ($user->user_type !== 'customer') {
            return redirect()->back();
        }

        //Current cart is the user's cart if we made it this far
        $cart = $user->cart;

        //Checks if the dish exists before adding it 
        $dish = Dish::find($dishId);
        if(!$dish){
            return redirect()->back();
        }

        // Create a cart if it doesn't exist for the user
        if (!$cart) {
            $cart = Cart::create([
                'customer_id' => $user->id,
                'restaurant_id' => $dish->user_id,
            ]);
        }

        

        // Add the dish to the cart
        $cart->dishes()->attach($dishId);

        return redirect()->route('restaurants.show', ['id'=>$dish->user_id]);
    }


}
