<?php

namespace Narwanimonish\SESEvents;

use Illuminate\Support\ServiceProvider;

class SESEventsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/ses-events.php' => config_path('ses-events.php'),
            ], 'config');

            $this->publishes([
                __DIR__ . '/../resources/views' => base_path('resources/views/vendor/laravel-ses-events'),
            ], 'views');

            if (!class_exists('CreatePackageTable')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/create_ses_events.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_ses_events.php'),
                ], 'migrations');
            }
        }

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'skeleton');
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/ses-events.php', 'ses-events');
    }
}
