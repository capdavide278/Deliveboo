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
        $this->app->singleton(Gateway::class, function($app) {
            return new Gateway(
                [
                    'environment'   => 'sandbox',
                    'merchantId'    => '9xsqjb7rskg57km2',
                    'publicKey'     => '3jhwscx4ph6wzsjn',
                    'privateKey'    => 'eacd411893d9b4a13f050a1fbfb1c608'
                ]
            );
        });
    }
}
