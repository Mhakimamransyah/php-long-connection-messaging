<?php

namespace Api\v1\report;

use Api\RouterResolver;

class Router extends RouterResolver {

    public function registerPath() : void {
        $this->resolve([]);
    }

}