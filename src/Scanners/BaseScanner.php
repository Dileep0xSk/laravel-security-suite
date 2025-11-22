<?php

namespace SecurityLabs\LaravelSecurityChecker\Scanners;

abstract class BaseScanner
{
    protected $cmd;

    public function __construct($cmd)
    {
        $this->cmd = $cmd;
    }

    abstract public function run();

    protected function pass($msg)
    {
        $this->cmd->info("✔️  $msg");
    }

    protected function warn($msg)
    {
        $this->cmd->warn("⚠️  $msg");
    }

    protected function fail($msg)
    {
        $this->cmd->error("❌ $msg");
    }
}
