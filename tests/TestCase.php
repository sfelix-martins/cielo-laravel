<?php

namespace SMartins\Cielo\Tests;

use SMartins\Cielo\CieloServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [CieloServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return ['Cielo' => 'SMartins\Cielo\Facades\Cielo'];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'cielo');
        $app['config']->set('database.connections.cielo', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }
}
