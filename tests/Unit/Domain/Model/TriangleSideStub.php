<?php

namespace Tradeshift\Triangle\Tests\Unit\Domain\Model;

use Tradeshift\Triangle\Domain\Model\TriangleSide;

class TriangleSideStub
{
    public static function create(float $length): TriangleSide
    {
        return new TriangleSide($length ?? self::randomFloat());
    }

    public static function random(): TriangleSide
    {
        return new TriangleSide(self::randomFloat());
    }

    private static function randomFloat(): float
    {
        return (float) mt_rand();
    }
}
