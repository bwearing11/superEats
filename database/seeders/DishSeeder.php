<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create some sample dishes
        Dish::create([
            'name' => 'Spaghetti Bolognese',
            'description' => 'Classic Italian pasta with meat sauce.',
            'price' => '12.99',
            'user_id' => 2,
        ]);

        Dish::create([
            'name' => 'Chicken Alfredo',
            'description' => 'Creamy pasta with grilled chicken.',
            'price' => '14.99',
            'user_id' => 2,
        ]);

        Dish::create([
            'name' => 'Margherita Pizza',
            'description' => 'Traditional Italian pizza with tomatoes, mozzarella, and basil.',
            'price' => '10.99',
            'user_id' => 2,
        ]);

        Dish::create([
            'name' => 'Sushi Platter',
            'description' => 'Assortment of fresh sushi rolls.',
            'price' => '18.99',
            'user_id' => 3,
        ]);
        
        Dish::create([
            'name' => 'Bacon Cheeseburger',
            'description' => 'Juicy beef patty with bacon and melted cheese.',
            'price' => '13.99',
            'user_id' => 3,
        ]);
        
        Dish::create([
            'name' => 'Vegetarian Stir-Fry',
            'description' => 'Fresh vegetables stir-fried in a savory sauce.',
            'price' => '11.99',
            'user_id' => 4,
        ]);
        
        Dish::create([
            'name' => 'Pancake Stack',
            'description' => 'Fluffy pancakes served with maple syrup.',
            'price' => '8.99',
            'user_id' => 4,
        ]);
        
        Dish::create([
            'name' => 'Grilled Salmon',
            'description' => 'Succulent grilled salmon fillet with lemon.',
            'price' => '16.99',
            'user_id' => 5,
        ]);
        
        Dish::create([
            'name' => 'Caprese Salad',
            'description' => 'Fresh tomatoes, mozzarella, and basil drizzled with balsamic glaze.',
            'price' => '9.99',
            'user_id' => 5,
        ]);
        
        Dish::create([
            'name' => 'Club Sandwich',
            'description' => 'Triple-decker sandwich with ham, turkey, bacon, lettuce, and tomato.',
            'price' => '12.99',
            'user_id' => 6,
        ]);
        
        Dish::create([
            'name' => 'Mango Tango Smoothie',
            'description' => 'Refreshing smoothie with mango and tropical fruits.',
            'price' => '5.99',
            'user_id' => 6,
        ]);

    }
}
