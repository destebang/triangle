<?php

namespace Tradeshift\Triangle\Tests\Domain\Model;

use Tradeshift\Triangle\Domain\Model\EquilateralTriangle;
use Tradeshift\Triangle\Domain\Model\IsoscelesTriangle;
use Tradeshift\Triangle\Domain\Model\ScaleneTriangle;
use Tradeshift\Triangle\Domain\Model\Triangle;
use Tradeshift\Triangle\Domain\Model\TriangleSide;

class TriangleStub
{
    public static function create(
        ?TriangleSide $firstSide = null,
        ?TriangleSide $secondSide = null,
        ?TriangleSide $thirdSide = null,
        string $class = null
    ): Triangle {

        $triangle = $class ?? array_rand([ScaleneTriangle::class, EquilateralTriangle::class, IsoscelesTriangle::class]);

        return new $triangle(
            $firstSide ?? TriangleSideStub::random(),
            $secondSide ?? TriangleSideStub::random(),
            $thirdSide ?? TriangleSideStub::random()
        );
    }

    public static function equilater(): Triangle
    {
        $triangleSide = TriangleSideStub::random();

        return self::create(
            $triangleSide,
            $triangleSide,
            $triangleSide,
            EquilateralTriangle::class
        );
    }

    public static function isosceles(): Triangle
    {
        $triangleSide = TriangleSideStub::random();

        return self::create(
            TriangleSideStub::create(12.23),
            $triangleSide,
            $triangleSide,
            EquilateralTriangle::class
        );
    }

    public static function scalene(): Triangle
    {
        return self::create(
            TriangleSideStub::random(),
            TriangleSideStub::random(),
            TriangleSideStub::random(),
            ScaleneTriangle::class
        );
    }
}