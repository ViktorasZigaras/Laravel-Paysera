<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CartService;

class CartServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(CartService::class, function($app) {
            $cart = new CartService();
            $cart->request = $this->app->request;
            return $cart;
        });
    }

    public function boot()
    {
        //
    }
}
