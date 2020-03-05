<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Validator::extend('email_domain', function($attribute, $value, $parameters, $validator) {
        	$allowedEmailDomains = ['gmail.com', 'tourist.inc','edu.np','abc.com'];
        	return in_array( explode('@', $parameters[0])[1] , $allowedEmailDomains);
        });
    }
}
