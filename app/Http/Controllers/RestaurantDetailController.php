<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RestaurantDetailController extends Controller
{
    public function show($id)
    {
        $user = User::with('dishes')->findOrFail($id);
        return view('restaurantDetail', compact('user'));
    }
}
