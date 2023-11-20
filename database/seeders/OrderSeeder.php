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
            $orderDate = Carbon::now()->subDays(rand(1, 30));

            $orderId = DB::table('orders')->insertGetId([
                'customer_id' => $customerId,
                'restaurant_id' => 2,
                'order_date' => $orderDate,
                'created_at' => $orderDate,
                'updated_at' => $orderDate,
            ]);

            // Using this to set a number of dishes per order
            $numberOfDishes = rand(1, 1);

            // Gets all of the dishes id's in a random order
            $dishIds = DB::table('dishes')->inRandomOrder()->limit($numberOfDishes)->pluck('id');

            // Add the values to the table
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
