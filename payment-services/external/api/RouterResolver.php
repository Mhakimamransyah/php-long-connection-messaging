<?php

namespace Api;

use FrameworkX\App as App;
use Api\middleware\RequestInjector;
use Config\Config;

abstract class RouterResolver implements Resolver {

    private ?App $app   = null;
    protected ?Config $config = null;

    protected function resolve(array $routes) {
        foreach ($routes as $route) {
            
            $method = trim(strtoupper($route[0]));

            if ($method == "GET") {
                $this->app->get($route[1], new RequestInjector($route[2]), ...$route[3]::controller($this->config));
            }

            if ($method == "POST") {
                $this->app->post($route[1], new RequestInjector($route[2]), ...$route[3]::controller($this->config));
            }

            if ($method == "PUT") {
                $this->app->put($route[1], new RequestInjector($route[2]),  ...$route[3]::controller($this->config));
            }

            if ($method == "PATCH") {
                $this->app->patch($route[1], new RequestInjector($route[2]), ...$route[3]::controller($this->config));
            }

            if ($method == "DELETE") {
                $this->app->delete($route[1], new RequestInjector($route[2]), ...$route[3]::controller($this->config));
            }
        }
    }

    public function init(App &$app, Config &$config) {
        $this->app = $app;
        $this->config = $config;
        return $this;
    }

}

interface Resolver {
    /**
     * router method, path, method and controller definition
     */
    public function registerPath() : void;
    
}