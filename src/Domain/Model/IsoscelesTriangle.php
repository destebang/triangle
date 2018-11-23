<?php

namespace Tradeshift\Triangle\Domain\Model;

final class IsoscelesTriangle extends Triangle
{
    public function type(): TriangleType
    {
        return TriangleType::isosceles();
    }

    public static function differentLengthsForType(): int
    {
        return 2;
    }

}