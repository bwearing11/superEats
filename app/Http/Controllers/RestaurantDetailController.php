<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cart;
use Illuminate\Http\Request;

class RestaurantDetailController extends Controller
{
    public function show($id)
    {
        $user = User::with('dishes')->find($id);

        if ($user) {
            $cart = null;

            if ($user->user_type === 'customer') {

                // Get the cart for the current customer
                $cart = Cart::where('user_id', auth()->id())->with('dishes')->first();
            }

            return view('restaurantDetail', compact('user', 'cart'));
        }
        //Worst comes to worst 404
        return abort(404);
    }
}
