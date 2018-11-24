<?php

namespace Tradeshift\Triangle\Tests\Unit\Domain\Model;

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

    public static function createUnsupported(): TriangleSides
    {
        $side = TriangleSideStub::random();

        return new class($side, $side, $side) extends TriangleSides {
            public function differentLengths(): int
            {
                return 12;
            }
        };
    }

    public static function createFromFloat(
        ?float $firstSide = null,
        ?float $secondSide = null,
        ?float $thirdSide = null
    ): TriangleSides {
        return self::create(
            $firstSide ? new TriangleSide($firstSide) : null,
            $secondSide ? new TriangleSide($secondSide) : null,
            $thirdSide ? new TriangleSide($thirdSide) : null
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