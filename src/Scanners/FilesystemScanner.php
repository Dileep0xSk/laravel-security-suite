<?php

namespace SecurityLabs\LaravelSecurityChecker\Scanners;

class FilesystemScanner extends BaseScanner
{
    public function run()
    {
        $this->cmd->info("\n📁 Filesystem Scan:");

        if (is_writable(base_path('vendor'))) {
            $this->fail("vendor/ directory is writable. This is a security risk.");
        } else {
            $this->pass("vendor/ directory is secure.");
        }

        if (file_exists(public_path('.env'))) {
            $this->fail(".env file is publicly accessible in /public");
        }

        $this->pass("Filesystem scan completed.");
    }
}
