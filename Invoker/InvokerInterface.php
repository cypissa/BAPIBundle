<?php

namespace Cogi\BAPIBundle\Invoker;

interface InvokerInterface
{
    /**
     * @param string $method    - HTTP-correspond method {GET, POST, PUT, DELETE ... }
     * @param string $resource  - resource identifier
     * @param array  $arguments - array of arguments
     */
    public function invoke($method, $resource, $arguments);
}