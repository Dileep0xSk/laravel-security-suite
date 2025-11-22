<?php

namespace SecurityLabs\LaravelSecuritySuite\Commands;

use SecurityLabs\LaravelSecuritySuite\Scanners\FilesystemScanner;
use SecurityLabs\LaravelSecuritySuite\Scanners\EnvironmentScanner;
use SecurityLabs\LaravelSecuritySuite\Scanners\RouteScanner;
use SecurityLabs\LaravelSecuritySuite\Scanners\MalwareScanner;
use SecurityLabs\LaravelSecuritySuite\Scanners\DockerScanner;
use SecurityLabs\LaravelSecuritySuite\Scanners\ConfigScanner;

class RunSecurityScan extends Command
{
    protected $signature = 'secure:scan';
    protected $description = 'Run full Laravel security scan';

    public function handle()
    {
        $this->info("\n🔒 Starting Laravel Security Scan...\n");

        $scanners = [
            new FilesystemScanner($this),
            new EnvironmentScanner($this),
            new RouteScanner($this),
            new MalwareScanner($this),
            new DockerScanner($this),
            new ConfigScanner($this),
        ];

        foreach ($scanners as $scanner) {
            $scanner->run();
        }

        $this->info("\n✅ Security scan completed successfully.\n");

        return 0;
    }
}
