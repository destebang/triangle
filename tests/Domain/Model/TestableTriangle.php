<?php

namespace Tradeshift\Triangle\Tests\Domain\Model;

use Tradeshift\Triangle\Domain\Model\Triangle;
use Tradeshift\Triangle\Domain\Model\TriangleType;

class TestableTriangle extends Triangle
{
    public function type(): TriangleType
    {
        return TriangleType::scalene();
    }
}