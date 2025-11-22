<?php

namespace SecurityLabs\LaravelSecuritySuite\Scanners;

class ConfigScanner extends BaseScanner
{
    public function run()
    {
        $this->cmd->info("\n⚙️ Configuration Scan:");

        if (!config('session.secure')) {
            $this->warn("session.secure is disabled.");
        }

        if (config('logging.default') === 'single') {
            $this->warn("Logging set to single. Consider daily or stack.");
        }

        $this->pass("Config scan completed.");
    }
}
