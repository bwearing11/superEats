<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use Illuminate\Support\Facades\DB;

class PopularDishesController extends Controller
{
    public function index(){

        $topDishes = Dish::withCount('orders')
            ->whereHas('orders', function ($query) {
                $query->where('order_date', '>=', now()->subDays(30));
            })
            ->orderByDesc('orders_count')
            ->take(5)
            ->get();


        return view('PopularDishes', ['topDishes' => $topDishes]);
    }
}
