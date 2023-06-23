<?php

namespace Api\v1\trackers\controller;

use Psr\Http\Message\ServerRequestInterface;
use Business\trackers\ports\TrackersService;
use Api\v1\trackers\response\TrackersResponse;

class TrackersController {

    use TrackersResponse;

    private ?ServerRequestInterface $request = null;
    private TrackersService $trackerService;

    function __construct(TrackersService &$trackerService) {
        $this->trackerService = $trackerService;
    }

    public function __invoke(ServerRequestInterface &$request) {
        $this->request = $request;
        return call_user_func([$this, $this->request->getAttribute('callback-method-name')]);
    }

    private function updatePackagesStatus()
    {
        $body   = $this->request->getParsedBody();
        $result = $this->trackerService->cascading($body);
        if ($result) {
            return $this->successUpdate($body);
        }
        return $this->failedUpdate($body);
    }

}

