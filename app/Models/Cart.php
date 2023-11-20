<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dishes()
    {
        return $this->belongsToMany(Dish::class)->withTimestamps();
    }

    public static function getUserCartItems($userId)
    {
        // Assuming there's a cart record associated with the user
        $cart = self::where('user_id', $userId)->first();

        if ($cart) {
            $cartItems = $cart->dishes()->get();
            return $cartItems;
        }

        return collect(); // Return an empty collection if no cart found
    }

    public function calculateTotal()
    {
        // Sum up the prices of all dishes in the cart
        return $this->dishes->sum('price');
    }
}
