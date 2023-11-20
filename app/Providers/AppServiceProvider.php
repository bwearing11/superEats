<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        //Extends the validator to add a custom rule to make it check that the new dish is unique within that particular user (restaurant)
        Validator::extend('uniqueWithinUser', function ($attribute, $value, $parameters, $validator) {
        // Parameters: dishes, name, ignore_id (what it checks against during the search), user_id,(restaurant)

        $ignoreId = isset($parameters[2]) ? $parameters[2] : null;
        $userId = isset($parameters[3]) ? $parameters[3] : null;

        //Checks the userid and compares it to the dish userId

        return \DB::table($parameters[0])
            ->where($parameters[1], $value)
            ->where('user_id', $userId)
            ->whereNotIn('id', (array) $ignoreId)
            ->doesntExist();
        });

    }
}
