<?php

namespace App\Providers;

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
        $this->app->bind(
            'App\BaseRepo\Order\OrderRepositoryInterface',
            'App\BaseRepo\Order\OrderRepository'
        );
        $this->app->bind(
            'App\BaseRepo\Product\ProductRepositoryInterface',
            'App\BaseRepo\Product\ProductRepository'
        );
        $this->app->bind(
            'App\BaseRepo\PaymentProcess\PaymentProcessRepositoryInsterface',
            'App\BaseRepo\PaymentProcess\PaymentProcessRepository'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
