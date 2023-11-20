<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RestaurantDetailController extends Controller
{
    //Generates the view, including finding the cart and restaurant dishes
    public function show($id)
    {
        //User is the restaurant
        $user = User::with('dishes')->find($id);

        if ($user) {
            $cart = null;

            // Get the cart for the current customer
            $cart = Cart::where('customer_id', auth()->id())
                        ->where('restaurant_id', $id) 
                        ->with('dishes')
                        ->first();

            return view('restaurantDetail', compact('user', 'cart'));
        }
        //Worst comes to worst 404
        return abort(404);
    }

    //Deletes the cart by finding the cart and currently logged in user
    public function emptyCart($restaurantId)
    {
        // Ensure the user is logged in before continuing
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Ensure the user has the correct user_type
        $user = auth()->user();
        if ($user->user_type !== 'customer') {
            return redirect()->back();
        }

        // Find and delete the cart for the current customer and restaurant
        $cart = Cart::where('customer_id', $user->id)
                    ->where('restaurant_id', $restaurantId)
                    ->first();

        if ($cart) {
            $cart->delete();
            return redirect()->route('restaurants.show', ['id' => $restaurantId]);     
        }

        return redirect()->route('restaurants.show', ['id' => $restaurantId]);
    }


    public function checkout($restaurantId)
    {
        // Ensure the user is logged in before continuing
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Ensure the user has the correct user_type
        $user = auth()->user();
        if ($user->user_type !== 'customer') {
            return redirect()->back();
        }

        // Find the cart for the current customer and restaurant
        $cart = Cart::where('customer_id', $user->id)
                    ->where('restaurant_id', $restaurantId)
                    ->with('dishes')
                    ->first();

        if (!$cart) {
            //Need to implement errors in my view
            return redirect()->route('restaurants.show', ['id' => $restaurantId])
                ->with('error', 'Cart not found.');
        }

        // Create an order based on the cart
        $order = new Order([
            'customer_id' => $user->id,
            'restaurant_id' => $restaurantId,
            'order_date' => now(),
        ]);

        DB::transaction(function () use ($order, $cart) {
            $order->save();

            // Attach dishes from the cart to the order
            $order->dishes()->attach($cart->dishes);

            // Empty the cart
            $cart->delete();
        });

        return redirect()->route('restaurants.show', ['id' => $restaurantId])
            ->with('success', 'Order placed successfully. Cart emptied.');
    }


}
