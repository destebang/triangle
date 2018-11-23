<?php

namespace Tradeshift\Triangle\Domain\Model;

final class IsoscelesTriangle extends Triangle
{
    public function type(): TriangleType
    {
        return TriangleType::isosceles();
    }

    protected function differentLengthsForType(): int
    {
        return 2;
    }

}