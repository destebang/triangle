<?php

declare(strict_types=1);

namespace Tradeshift\Triangle\Domain\Service;

use Tradeshift\Triangle\Domain\Model\EquilateralTriangle;
use Tradeshift\Triangle\Domain\Model\IsoscelesTriangle;
use Tradeshift\Triangle\Domain\Model\ScaleneTriangle;
use Tradeshift\Triangle\Domain\Model\TriangleSide;

final class TriangleFactory
{
    private const DIFFERENT_LENGTHS_TO_TRIANGLE_MAPPER = [
        1 => EquilateralTriangle::class,
        2 => IsoscelesTriangle::class,
        3 => ScaleneTriangle::class
    ];

    public function create(TriangleSide $firstSide, TriangleSide $secondSide, TriangleSide $thirdSide)
    {
        $differentSidesLength = $this->differentLengthsSidesCalculator($firstSide, $secondSide, $thirdSide);
        $this->guardAgainstUnsupportedDifferentSidesLength($differentSidesLength);
        $triangle = self::DIFFERENT_LENGTHS_TO_TRIANGLE_MAPPER[$differentSidesLength];

        return new $triangle($firstSide, $secondSide, $thirdSide);
    }

    /**
     * @param TriangleSide[] $triangleSides
     * @return int
     */
    private function differentLengthsSidesCalculator(TriangleSide ...$triangleSides): int
    {
        $triangleSideToLength = function (TriangleSide $triangleSide): float {
            return $triangleSide->length();
        };

        $lengthsAsFloat = array_map(
            $triangleSideToLength,
            $triangleSides
        );

        return count(array_unique($lengthsAsFloat));
    }

    private function guardAgainstUnsupportedDifferentSidesLength(int $differentSidesLength)
    {
        if (!array_key_exists($differentSidesLength, self::DIFFERENT_LENGTHS_TO_TRIANGLE_MAPPER)) {
            throw new \RuntimeException("There has been a problem calculating the triangle type");
        }
    }
}
