<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cart;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    //Returns restaurantList view with pagination
    public function index()
    {
        $restaurantUsers = User::where('user_type', 'restaurant')->paginate(4);
        return view('restaurantList', ['restaurantUsers' => $restaurantUsers]);
    }

}
