<?php

namespace Cogi\BAPIBundle\Sample\Service;

class FibonacciLib
{
    public function compute($n)
    {
        if ($n <= 2) {
            return 1;
        }

        $prev = 1;
        $last = 1;
        for ($i = 3; $i <= $n; $i++) {
            $act = $prev + $last;
            $prev = $last;
            $last = $act;
        }

        return $act;
    }
} 