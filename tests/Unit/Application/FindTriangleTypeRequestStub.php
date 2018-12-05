<?php

namespace Tradeshift\Triangle\Tests\Unit\Application;

use Tradeshift\Triangle\Application\FindTriangleTypeRequest;
use Tradeshift\Triangle\Tests\Unit\Domain\Model\TriangleSidesStub;
use Tradeshift\Triangle\Tests\Unit\Domain\Model\TriangleSideStub;

class FindTriangleTypeRequestStub
{
    public static function create(
        ?float $firstSide = null,
        ?float $secondSide = null,
        ?float $thirdSide = null
    ): FindTriangleTypeRequest {
        return new FindTriangleTypeRequest(
            $firstSide ?? TriangleSideStub::random()->length(),
            $secondSide ?? TriangleSideStub::random()->length(),
            $thirdSide ?? TriangleSideStub::random()->length()
        );
    }

    public static function equilateral(): FindTriangleTypeRequest
    {
        $triangleSides = TriangleSideStub::random();

        return self::create(
            $triangleSides->length(),
            $triangleSides->length(),
            $triangleSides->length()
        );
    }

    public static function isosceles(): FindTriangleTypeRequest
    {
        $triangleSides = TriangleSidesStub::isosceles();

        return self::create(
            $triangleSides->firstSide()->length(),
            $triangleSides->secondSide()->length(),
            $triangleSides->thirdSide()->length()
        );
    }

    public static function scalene(): FindTriangleTypeRequest
    {
        $triangleSides = TriangleSidesStub::scalene();

        return self::create(
            $triangleSides->firstSide()->length(),
            $triangleSides->secondSide()->length(),
            $triangleSides->thirdSide()->length()
        );
    }
}