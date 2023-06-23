<?php

namespace Api\v1\trackers;

use Api\RouterResolver;
use Api\v1\trackers\injectors\TrackersInjector;

class Router extends RouterResolver {

    public function registerPath() : void {
        $this->resolve([
            ['PUT','/api/v1/packages','updatePackagesStatus', TrackersInjector::class]
        ]);
    }

}