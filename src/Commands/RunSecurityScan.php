<?php

namespace SecurityLabs\LaravelSecurityChecker\Commands;

use Illuminate\Console\Command;
use SecurityLabs\LaravelSecurityChecker\Scanners\FilesystemScanner;
use SecurityLabs\LaravelSecurityChecker\Scanners\EnvironmentScanner;
use SecurityLabs\LaravelSecurityChecker\Scanners\RouteScanner;
use SecurityLabs\LaravelSecurityChecker\Scanners\MalwareScanner;
use SecurityLabs\LaravelSecurityChecker\Scanners\DockerScanner;
use SecurityLabs\LaravelSecurityChecker\Scanners\ConfigScanner;

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
