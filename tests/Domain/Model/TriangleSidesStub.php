<?php

namespace Tradeshift\Triangle\Tests\Domain\Model;

use Tradeshift\Triangle\Domain\Model\TriangleSide;
use Tradeshift\Triangle\Domain\Model\TriangleSides;

class TriangleSidesStub
{
    public static function create(
        ?TriangleSide $firstSide = null,
        ?TriangleSide $secondSide = null,
        ?TriangleSide $thirdSide = null
    ): TriangleSides {
        return new TriangleSides(
            $firstSide ?? TriangleSideStub::random(),
            $secondSide ?? TriangleSideStub::random(),
            $thirdSide ?? TriangleSideStub::random()
        );
    }

    public static function equilater(): TriangleSides
    {
        $triangleSide = TriangleSideStub::random();

        return self::create(
            $triangleSide,
            $triangleSide,
            $triangleSide
        );
    }

    public static function isosceles(): TriangleSides
    {
        $triangleSide = TriangleSideStub::random(222.324);

        return self::create(
            TriangleSideStub::create(12.23),
            $triangleSide,
            $triangleSide
        );
    }

    public static function scalene(): TriangleSides
    {
        return self::create(
            TriangleSideStub::random(),
            TriangleSideStub::random(),
            TriangleSideStub::random()
        );
    }
}