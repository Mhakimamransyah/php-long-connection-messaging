<?php

namespace Api\middleware;

use Psr\Http\Message\ServerRequestInterface;

class RequestInjector {
    
    private string $methodName;

    function __construct($methodName) {
        $this->methodName = $methodName;
    }

    public function __invoke(ServerRequestInterface $request, callable $next)
    {
        $request = $request->withAttribute('callback-method-name', $this->methodName);
        return $next($request);
    }

}