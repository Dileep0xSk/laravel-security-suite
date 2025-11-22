<?php

namespace SecurityLabs\LaravelSecurityChecker\Scanners;

class EnvironmentScanner extends BaseScanner
{
    public function run()
    {
        $this->cmd->info("\n🌍 Environment Scan:");

        if (config('app.debug')) {
            $this->fail("APP_DEBUG is enabled. Disable in production.");
        }

        if (!config('app.key')) {
            $this->fail("APP_KEY is missing.");
        }

        $this->pass("Environment scan completed.");
    }
}
