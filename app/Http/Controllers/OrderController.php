<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index($id)
    {
        // Retrieve the restaurant user
        $restaurantUser = User::findOrFail($id);

        // Get the orders for the restaurant
        $orders = $restaurantUser->orders;

        // Return the view with orders data
        return view('restaurantOrders', compact('restaurantUser', 'orders'));
    }
}
