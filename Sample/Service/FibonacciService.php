<?php

namespace Cogi\BAPIBundle\Sample\Service;

use Cogi\BAPIBundle\PublicApi\ServiceInterface;

class FibonacciService implements ServiceInterface
{
    protected $fibonacciLib;

    public function __construct(FibonacciLib $lib)
    {
        $this->fibonacciLib = $lib;
    }

    public function get(array $args)
    {
        $n = $args[0];

        return $this->fibonacciLib->compute($n);
    }
}
