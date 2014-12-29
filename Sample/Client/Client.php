<?php

namespace Cogi\BAPIBundle\Sample\Client;

use Cogi\BAPIBundle\Caller\Caller;

class Client
{
    protected $caller;

    public function __construct(Caller $caller)
    {
        $this->caller = $caller;
    }

    public function getNumber($n)
    {
        $result = $this->caller->call('GET', 'bapi.sample.service.fib', array($n));

        return $result;
    }
}
