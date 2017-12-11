<?php

namespace SMartins\Cielo;

use Illuminate\Support\ServiceProvider;
use Cielo\API30\Merchant;
use Cielo\API30\Ecommerce\Environment;
use Cielo\API30\Ecommerce\CieloEcommerce;

class CieloServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $source = realpath(__DIR__.'/../config/cielo.php');

        $this->publishes([$source => config_path('cielo.php')]);

        $this->mergeConfigFrom($source, 'cielo');
    }

    public function register()
    {
        $this->app->singleton('Cielo', function ($app) {
            $merchant = new Merchant(
                $app->config->get('cielo.merchant_id'),
                $app->config->get('cielo.merchant_key')
            );

            $env = $app->config->get('cielo.environment');
            if ($env === 'production') {
                $environment = Environment::production();
            } else {
                $environment = Environment::sandbox();
            }

            return new CieloEcommerce($merchant, $environment);
        });
    }
}
