<?php

namespace SecurityLabs\LaravelSecurityChecker;

use Illuminate\Support\ServiceProvider;
use SecurityLabs\LaravelSecurityChecker\Commands\RunSecurityScan;

class SecurityCheckerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/security-checker.php', 'security-checker');
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/security-checker.php' => config_path('security-checker.php'),
            ], 'security-checker-config');

            $this->commands([
                RunSecurityScan::class,
            ]);
        }
    }
}
