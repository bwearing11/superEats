<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testUsers = [
            [
                'name' => 'John',
                'email' => 'john@gmail.com',
                'address' => '123 Sesame Street',
                'user_type' => 'customer',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Bob',
                'email' => 'bob@gmail.com',
                'address' => '125 Sesame Street',
                'user_type' => 'restaurant',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Burger House',
                'email' => 'burger@gmail.com',
                'address' => '1 Burger Street',
                'user_type' => 'restaurant',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Waffle Home',
                'email' => 'waffle@gmail.com',
                'address' => '3 Waffle Street',
                'user_type' => 'restaurant',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Sushi Room',
                'email' => 'sushi@sushi.jp',
                'address' => '45 Sushi Lane',
                'user_type' => 'restaurant',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Sammy Sandwich',
                'email' => 'sandwich@gmail.com',
                'address' => '2 White Bread Street',
                'user_type' => 'restaurant',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Pizza Palace',
                'email' => 'pizza@gmail.com',
                'address' => '7 Pizza Avenue',
                'user_type' => 'restaurant',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Taco Town',
                'email' => 'taco@gmail.com',
                'address' => '15 Taco Lane',
                'user_type' => 'restaurant',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Pasta Paradise',
                'email' => 'pasta@gmail.com',
                'address' => '20 Pasta Street',
                'user_type' => 'restaurant',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Salad Spot',
                'email' => 'salad@gmail.com',
                'address' => '5 Green Leaf Boulevard',
                'user_type' => 'restaurant',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Smoothie Haven',
                'email' => 'smoothie@gmail.com',
                'address' => '30 Fruit Avenue',
                'user_type' => 'restaurant',
                'password' => Hash::make('password'),
            ],
        ];

        DB::table('users')->insert($testUsers);
    }
}
