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
               'merchantId' => '7rtbgmk3qzpmrmbb',
               'publicKey' => '2dg5pmw3ggx7kc52',
               'privateKey' => '3ae6ab6fe42759c16d10ffbb1ceb7b6c'
               ]
               );
        });
    }
}
