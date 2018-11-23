<?php

declare(strict_types=1);

namespace Tradeshift\Triangle\Domain\Service;

use Tradeshift\Triangle\Domain\Model\Triangle;
use Tradeshift\Triangle\Domain\Model\TriangleSides;
use Tradeshift\Triangle\Domain\Model\TriangleType;

final class TriangleFactory
{
    public function create(TriangleSides $sides): Triangle
    {
        $specificTriangle = $this->mapDifferentLengthsToSpecificTriangle($sides->differentLengths());

        return new $specificTriangle($sides);
    }

    private function mapDifferentLengthsToSpecificTriangle(int $differentSidesLength): string
    {
        foreach (TriangleType::types() as $type => $triangleClassName) {
            if ($triangleClassName::differentLengthsForType() === $differentSidesLength) {
                return $triangleClassName;
            }
        }

        throw new \RuntimeException("There has been a problem calculating the triangle type");
    }
}
