<?php

namespace Cogi\BAPIBundle\Tests\Sample\Service;

use Cogi\BAPIBundle\Sample\Service\FibonacciLib;
use IOKI\CommonBundle\Test\IokiBaseTestCase;

class FibonacciServiceTest extends IokiBaseTestCase
{
    protected $sut;

    public function setUp()
    {
        $this->sut = new FibonacciLib();
    }

    /**
     * @param $n
     * @param $expectedResult
     *
     * @dataProvider dataProvider_testCompute
     */
    public function testCompute($n, $expectedResult)
    {
        $this->assertEquals($expectedResult, $this->sut->compute($n));
    }

    public static function dataProvider_testCompute()
    {
        return [
            [1, 1],
            [2, 1],
            [3, 2],
            [4, 3],
            [5, 5],
            [6, 8],
            [7, 13]
        ];
    }
} 