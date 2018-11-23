<?php

declare(strict_types=1);

namespace Tradeshift\Triangle\Domain\Model;

final class EquilateralTriangle extends Triangle
{
    public function type(): TriangleType
    {
        return TriangleType::equilateral();
    }

    protected function differentLengthsForType(): int
    {
        return 1;
    }

}