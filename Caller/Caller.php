<?php

namespace Cogi\BAPIBundle\Caller;

use Cogi\BAPIBundle\Invoker\InvokeException;
use Cogi\BAPIBundle\Invoker\InvokerInterface;

/**
 * The front class for communicating to other services
 *
 * @author Cyprian Nosek <cnosek@ioki.com.pl>
 */
class Caller
{
    public static $allowedMethods = [
        'get', 'post', 'put', 'delete',
    ];

    protected $invoker;

    /**
     * @param InvokerInterface $invoker - protocol specific class to invoke requested service and method
     */
    public function __construct(InvokerInterface $invoker)
    {
        $this->invoker = $invoker;
    }

    /**
     * @param string $method    - HTTP-correspond method {GET, POST, PUT, DELETE ... }
     * @param string $resource  - resource identifier
     * @param array  $arguments - array of arguments
     *
     * @throws InvokeException
     */
    public function call($method, $resource, $arguments)
    {
        $method = strtolower($method);
        if (!in_array($method, self::$allowedMethods)) {
            throw new InvokeException(sprintf("Not allowed method %s", $method));
        }

        return $this->invoker->invoke($method, $resource, $arguments);
    }
}
