<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $users = DB::table('users')->where('user_type', 'customer')->pluck('id');

        foreach ($users as $customerId) {
            // Gets a date from the last 30 days

            //Checks if the current user is a restaurant
            $restaurantId = DB::table('users')->where('user_type', 'restaurant')->value('id');

            //If there is a restaurant_id, make an order for it. This gets done once for each restaurant
            if($restaurantId){
                $orderId = DB::table('orders')->insertGetId([
                    'customer_id' => $customerId,
                    'restaurant_id' => $restaurantId,
                    'order_date' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // Using this to set a number of dishes per order
            $numberOfDishes = rand(1, 1);

            // Gets all of the dishes id's
            $dishIds = DB::table('dishes')->where('user_id', $restaurantId)->inRandomOrder()->limit($numberOfDishes)->pluck('id');

            // Loops through each of the dishids and adds them to the pivot table with the current orderID
            foreach ($dishIds as $dishId) {
                DB::table('order_dish')->insert([
                    'order_id' => $orderId,
                    'dish_id' => $dishId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
