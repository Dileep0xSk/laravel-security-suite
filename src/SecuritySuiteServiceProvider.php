<?php

namespace SecurityLabs\LaravelSecuritySuite;

use Illuminate\Support\ServiceProvider;
use SecurityLabs\LaravelSecuritySuite\Commands\RunSecurityScan;

class SecuritySuiteServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/security-suite.php',
            'security-suite'
        );
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__ . '/../config/security-suite.php' => config_path('security-suite.php'),
            ], 'security-suite-config');

            $this->commands([
                RunSecurityScan::class,
            ]);
        }
    }
}
