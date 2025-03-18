<?php

namespace Mantix\EBoekhoudenRestLaravel\Tests;

use Mantix\EBoekhoudenRestLaravel\EBoekhoudenServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra {
    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array<int, class-string>
     */
    protected function getPackageProviders($app) {
        return [
            EBoekhoudenServiceProvider::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function defineEnvironment($app) {
        // Setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'testing');
        $app['config']->set('database.connections.testing', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);

        // Set e-Boekhouden config for testing
        $app['config']->set('eboekhouden.api_token', 'test_token');
        $app['config']->set('eboekhouden.source', 'TestApp');
    }
}
