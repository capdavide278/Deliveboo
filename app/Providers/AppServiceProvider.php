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
                'merchantId' => '9xsqjb7rskg57km2',
                'publicKey' => 'sgn5wzkynrdrmhwz',
                'privateKey' => '7ce39acbad1f496c9bab602f92b65313'
               ]
               );
        });
    }
}
