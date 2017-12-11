<?php

namespace SMartins\Cielo\Tests;

use SMartins\Cielo\CieloServiceProvider;
use Cielo\API30\Ecommerce\CieloEcommerce;

class ServiceProviderTest extends TestCase
{
    public function testIfTheServiceProviderWasLoaded()
    {
        $cielo = CieloServiceProvider::class;
        $providers = $this->app->getLoadedProviders();

        $this->assertArrayHasKey($cielo, $providers);
    }

    public function testIfTheCieloEcommerceIsBoundToTheContainer()
    {
        $this->assertInstanceOf(
            CieloEcommerce::class,
            $this->app->make('Cielo')
        );
    }

    public function testIfTheConfigFileWasLoadedAndKeysExists()
    {
        $keys = ['merchant_id', 'merchant_key', 'environment'];
        foreach ($keys as $key) {
            $this->assertTrue($this->app->config->has('cielo.'.$key));
        }
    }

    public function testIfTheConfigFileCanBePublished()
    {
        $configFile = $this->app->configPath().'/cielo.php';

        $this->artisan('vendor:publish', [
            '--provider' => CieloServiceProvider::class,
            '--force' => true,
        ]);

        $this->assertFileExists($configFile);

        if (is_file($configFile)) {
            unlink($configFile);
        }
    }
}
