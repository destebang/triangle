<?php

declare(strict_types=1);

namespace Tradeshift\Triangle\Domain\Service;

use Tradeshift\Triangle\Domain\Model\EquilateralTriangle;
use Tradeshift\Triangle\Domain\Model\IsoscelesTriangle;
use Tradeshift\Triangle\Domain\Model\ScaleneTriangle;
use Tradeshift\Triangle\Domain\Model\Triangle;
use Tradeshift\Triangle\Domain\Model\TriangleSides;
use Tradeshift\Triangle\Domain\Model\TriangleType;

final class TriangleFactory
{
    public function create(TriangleSides $sides): Triangle
    {
        $differentSidesLength = $sides->differentLengths();
        $this->guardAgainstUnsupportedDifferentSidesLength($differentSidesLength);
        $triangle = $this->differentLengthsToSpecificTriangleMapper()[$differentSidesLength];

        return new $triangle($sides);
    }

    private function guardAgainstUnsupportedDifferentSidesLength(int $differentSidesLength): void
    {
        if (!array_key_exists($differentSidesLength, $this->differentLengthsToSpecificTriangleMapper())) {
            throw new \RuntimeException("There has been a problem calculating the triangle type");
        }
    }

    private function differentLengthsToSpecificTriangleMapper(): array
    {
        $map = [];

        /**
         * @var Triangle $className
         */
        foreach (TriangleType::types() as $type => $className) {
            $map[$className::differentLengthsForType()] = $className;
        }

        return $map;
    }
}
