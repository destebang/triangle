<?php

declare(strict_types=1);

namespace Tradeshift\Triangle\Domain\Model;

final class ScaleneTriangle extends Triangle
{
    public function type(): TriangleType
    {
        return TriangleType::scalene();
    }

    protected function differentLengthsForType(): int
    {
        return 3;
    }

}