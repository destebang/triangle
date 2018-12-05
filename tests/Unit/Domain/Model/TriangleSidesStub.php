<?php

namespace Tradeshift\Triangle\Tests\Unit\Domain\Model;

use Tradeshift\Triangle\Domain\Model\TriangleSide;
use Tradeshift\Triangle\Domain\Model\TriangleSides;

final class TriangleSidesStub
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

    public static function random(): TriangleSides
    {
        return self::create();
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

    public static function equilateral(): TriangleSides
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
        $firstSide = TriangleSideStub::random();
        $equalSides = TriangleSideStub::create($firstSide->length() + 5);

        return self::create(
            $firstSide,
            $equalSides,
            $equalSides
        );
    }


    public static function invalidIsosceles(): TriangleSides
    {
        $firstSide = TriangleSideStub::random();
        $equalSide = TriangleSideStub::create($firstSide->length() / 4);

        return self::create(
            $firstSide,
            $equalSide,
            $equalSide
        );
    }

    public static function scalene(): TriangleSides
    {
        $firstSide = TriangleSideStub::random();

        return self::create(
            $firstSide,
            TriangleSideStub::create($firstSide->length() + 1.10),
            TriangleSideStub::create($firstSide->length() + 1.05)
        );
    }

    public static function invalidScalene(): TriangleSides
    {
        $firstSide = TriangleSideStub::random();
        $secondSide = TriangleSideStub::create($firstSide->length() * 3);
        $thirdSide = TriangleSideStub::create($secondSide->length() * 2);

        return self::create(
            $firstSide,
            $secondSide,
            $thirdSide
        );
    }
}