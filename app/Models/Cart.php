<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['customer_id', 'restaurant_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function dishes()
    {
        return $this->belongsToMany(Dish::class)->withTimestamps();
    }

    public static function getUserCartItems($userId)
    {
        // Assuming there's a cart record associated with the user
        $user = self::findOrFail($userId);

        // Check if the user has a cart relationship
        $cart = $user->cart;

        //return the dishes from the cart
        if ($cart) {
            return $cart->dishes;
        }

        return collect(); // Return an empty collection if no cart found
    }


    public function calculateTotal()
    {
        // Sum up the prices of all dishes in the cart
        return $this->dishes->sum('price');
    }
}
