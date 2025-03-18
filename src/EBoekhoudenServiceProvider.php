<?php

namespace Mantix\EBoekhoudenRestLaravel;

use Illuminate\Support\ServiceProvider;
use Mantix\EBoekhoudenRestApi\Client;

class EBoekhoudenServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        // Merge config
        $this->mergeConfigFrom(
            __DIR__ . '/../config/eboekhouden.php',
            'eboekhouden'
        );

        // Bind the client to the service container
        $this->app->singleton('eboekhouden', function ($app) {
            $config = $app['config']['eboekhouden'];

            return new Client(
                $config['api_token'],
                $config['source'],
                $config['client_options'] ?? []
            );
        });

        // Bind the client class to the service container
        $this->app->bind(Client::class, function ($app) {
            return $app['eboekhouden'];
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        // Publish config file
        $this->publishes([
            __DIR__ . '/../config/eboekhouden.php' => config_path('eboekhouden.php'),
        ], 'eboekhouden-config');
    }
}
