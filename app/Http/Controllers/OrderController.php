<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function index($id)
    {
        // Retrieve the restaurant user
        $restaurantUser = User::findOrFail($id);

        // Get the orders for the restaurant
        $orders = $restaurantUser->ordersReceived;

        // Return the view with orders data
        return view('orderList', ['orders' => $orders]);
    }
}
