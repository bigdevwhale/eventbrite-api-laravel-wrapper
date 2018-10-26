<?php

namespace Matat555\Youtube;

use Illuminate\Support\ServiceProvider;

class EventbriteServiceProvider extends ServiceProvider {
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $source = realpath(__DIR__ . '/config/eventbrite.php');

        $this->publishes([$source => config_path('eventbrite.php')]);

        $this->mergeConfigFrom($source, 'eventbrite');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Eventbrite::class, function () {
            return new Eventbrite(config('eventbrite.token'), config('eventbrite.secret'));
        });

        $this->app->alias(Eventbrite::class, 'eventbrite');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [Eventbrite::class];
    }
}