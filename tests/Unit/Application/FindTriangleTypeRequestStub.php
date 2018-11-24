<?php

namespace Tradeshift\Triangle\Tests\Unit\Application;

use Tradeshift\Triangle\Application\FindTriangleTypeRequest;
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
        $triangleSide = TriangleSideStub::random();

        return self::create(
            $triangleSide->length(),
            $triangleSide->length(),
            $triangleSide->length()
        );
    }

    public static function isosceles(): FindTriangleTypeRequest
    {
        $triangleSide = TriangleSideStub::random();

        return self::create(
            TriangleSideStub::random()->length(),
            $triangleSide->length(),
            $triangleSide->length()
        );
    }

    public static function scalene(): FindTriangleTypeRequest
    {
        return self::create(
            TriangleSideStub::random()->length(),
            TriangleSideStub::random()->length(),
            TriangleSideStub::random()->length()
        );
    }
}