<?php

namespace Cogi\BAPIBundle\Invoker;

use Cogi\BAPIBundle\Invoker\InvokerInterface;
use Cogi\BAPIBundle\PublicApi\ServiceInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException;

class DirectInvoker implements InvokerInterface
{
    const SERVICE_PREFIX = 'public.service.resource.';

    protected $container;

    /**
     * @param Container $container - service container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @param string $method    - HTTP-correspond method {GET, POST, PUT, DELETE ... }
     * @param string $resource  - resource identifier
     * @param array  $arguments - array of arguments
     *
     * @throws InvokeException
     */
    public function invoke($method, $resource, $arguments)
    {
        try {
            $service = $this->container->get(self::SERVICE_PREFIX . $resource);
        } catch (ServiceNotFoundException $e) {
            throw new InvokeException("Service not found");
        }

        if (!($service instanceof ServiceInterface)) {
            throw new InvokeException("The service should implement ServiceInterface");
        }

        if (!(method_exists($service, $method))) {
            throw new InvokeException("Method doesn't exist in requested service");
        }

        $result = $service->$method($arguments);

        return $result;
    }
}
