<?php

namespace SecurityLabs\LaravelSecuritySuite\Scanners;


class DockerScanner extends BaseScanner
{
    public function run()
    {
        $this->cmd->info("\n🐳 Docker Scan:");

        $dockerfile = base_path('Dockerfile');

        if (!file_exists($dockerfile)) {
            $this->warn("No Dockerfile found. Skipping Docker scan.");
            return;
        }

        $content = file_get_contents($dockerfile);

        if (!str_contains($content, 'USER')) {
            $this->warn("Dockerfile does not specify non-root USER.");
        }

        $this->pass("Docker scan completed.");
    }
}
