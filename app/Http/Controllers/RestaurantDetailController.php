<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RestaurantDetailController extends Controller
{
    public function show($id)
    {
        $user = User::with('dishes')->findOrFail($id);

        if ($user->user_type === 'customer') {
            // Get the cart for the authenticated customer
            $cart = Cart::where('user_id', auth()->id())->with('dishes')->first();
        } else {
            $cart = null;
        }

        return view('restaurantDetail', compact('user', 'cart'));
    }
}
