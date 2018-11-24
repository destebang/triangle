<?php

namespace Tradeshift\Triangle\Tests\Unit\Domain\Model;

use Tradeshift\Triangle\Domain\Model\EquilateralTriangle;
use Tradeshift\Triangle\Domain\Model\IsoscelesTriangle;
use Tradeshift\Triangle\Domain\Model\ScaleneTriangle;
use Tradeshift\Triangle\Domain\Model\Triangle;
use Tradeshift\Triangle\Domain\Model\TriangleSides;

class TriangleStub
{
    public static function create(?TriangleSides $triangleSides, string $class = null): Triangle
    {
        $triangle = $class ?? array_rand([
                ScaleneTriangle::class,
                EquilateralTriangle::class,
                IsoscelesTriangle::class
            ]);

        return new $triangle($triangleSides ?? TriangleSidesStub::random());
    }

    public static function invalidTriangle(): Triangle
    {
        $triangleSide = TriangleSidesStub::isosceles();

        return self::create(
            $triangleSide,
            EquilateralTriangle::class
        );
    }

    public static function equilateral(): Triangle
    {
        return self::create(
            TriangleSidesStub::equilateral(),
            EquilateralTriangle::class
        );
    }

    public static function isosceles(): Triangle
    {
        return self::create(
            TriangleSidesStub::isosceles(),
            IsoscelesTriangle::class
        );
    }

    public static function scalene(): Triangle
    {
        return self::create(
            TriangleSidesStub::scalene(),
            ScaleneTriangle::class
        );
    }
}