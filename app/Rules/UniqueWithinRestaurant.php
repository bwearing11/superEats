<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class UniqueWithinRestaurant implements ValidationRule
{
    //Create a new instance
    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //Checks if the dishname exists based on the passed in restaurant user_id
        $exists = DB::table('dishes')
            ->where('name', $value)
            ->where('user_id', $this->userId)
            ->exists();

            if ($exists) {
                $fail("The $attribute has already been taken for this restaurant.");
        }
    }

        public function message()
    {
        return 'The :attribute has already been taken for this restaurant.';
    }
}
