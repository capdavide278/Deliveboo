<?php

namespace App\Providers;

use Braintree\Gateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(Gateway::class, function($app){
            return new Gateway(
               [
                'environment' => 'sandbox',
                'merchantId' => "6mpmmxf9hsnfcsqp",
                'publicKey' => "ggw7cprq3vww3j3t",
                'privateKey' => "5fb1b3c4c9f9c0faccdcb4027ec8e1c0"
               ]
               );
        });
    }
}
