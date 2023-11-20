<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['customer_id', 'restaurant_id', 'order_date'];

    // Define a relationship with the customer (user) for customer-type users
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id')->where('user_type', 'customer');
    }

    // Define a relationship with the restaurant (user) for restaurant-type users
    public function restaurant()
    {
        return $this->belongsTo(User::class, 'restaurant_id')->where('user_type', 'restaurant');
    }

    // Define a many-to-many relationship with the Dish model
    public function dishes()
    {
        return $this->belongsToMany(Dish::class, 'order_dish')->withTimestamps();
    }

    public function calculateTotalPrice(){
        $totalPrice = 0;

        foreach($this->dishes as $dish){
            $totalPrice += $dish->price;
        }

        return $totalPrice;
    }
}
