<?php

declare(strict_types=1);

namespace Tradeshift\Triangle\Domain\Service;

use Tradeshift\Triangle\Domain\Model\EquilateralTriangle;
use Tradeshift\Triangle\Domain\Model\IsoscelesTriangle;
use Tradeshift\Triangle\Domain\Model\ScaleneTriangle;
use Tradeshift\Triangle\Domain\Model\Triangle;
use Tradeshift\Triangle\Domain\Model\TriangleSide;
use Tradeshift\Triangle\Domain\Model\TriangleSides;

final class TriangleFactory
{
    private const DIFFERENT_LENGTHS_TO_TRIANGLE_MAPPER = [
        1 => EquilateralTriangle::class,
        2 => IsoscelesTriangle::class,
        3 => ScaleneTriangle::class
    ];

    public function create(TriangleSides $sides): Triangle
    {
        $differentSidesLength = $sides->differentLengths();
        $this->guardAgainstUnsupportedDifferentSidesLength($differentSidesLength);
        $triangle = self::DIFFERENT_LENGTHS_TO_TRIANGLE_MAPPER[$differentSidesLength];

        return new $triangle($sides);
    }

    private function guardAgainstUnsupportedDifferentSidesLength(int $differentSidesLength): void
    {
        if (!array_key_exists($differentSidesLength, self::DIFFERENT_LENGTHS_TO_TRIANGLE_MAPPER)) {
            throw new \RuntimeException("There has been a problem calculating the triangle type");
        }
    }
}
