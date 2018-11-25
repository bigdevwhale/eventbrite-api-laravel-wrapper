<?php

namespace Marat555\Eventbrite;

use Illuminate\Support\ServiceProvider;
use Marat555\Eventbrite\Factories\Client;

class EventbriteServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->setupConfig();
    }

    /**
     * Setup the config.
     *
     * @return void
     */
    protected function setupConfig()
    {
        $source = realpath(__DIR__ . '/../config/eventbrite.php');

        if (class_exists('Illuminate\Foundation\Application', false)) {
            $this->publishes([ $source => config_path('eventbrite.php') ], 'config');
        }

        $this->mergeConfigFrom($source, 'eventbrite');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('eventbrite', function ($app) {
            $config = $app['config']->get('eventbrite');
            $client = new Client($config['baseUrl'], $config['token']);
            return new Eventbrite($client);
        });

        $this->app->alias('eventbrite', 'Marat555\Eventbrite\Eventbrite');
    }
}
