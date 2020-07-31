<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\PayseraService;

class PayseraServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(PayseraService::class, function($app) {
            $config = [
                'projectid'     => 181604,
                'sign_password' => '0b32d6a87c09c32b3cd90dfd5ef5699f'
            ];
            $paysera = new PayseraService($config);
            return $paysera;
        });
    }

    public function boot()
    {
        //
    }
}