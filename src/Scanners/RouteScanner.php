<?php

namespace SecurityLabs\LaravelSecuritySuite\Scanners;


class RouteScanner extends BaseScanner
{
    public function run()
    {
        $this->cmd->info("\n🛣️ Route Scan:");

        $routes = app('router')->getRoutes();

        foreach ($routes as $route) {
            if (empty($route->middleware())) {
                $this->warn("Route '{$route->uri()}' has NO middleware applied.");
            }
        }

        $this->pass("Route scan completed.");
    }
}
