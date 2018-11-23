<?php

namespace Tradeshift\Triangle\Domain\Model;

final class EquilateralTriangle extends Triangle
{
    public function type(): TriangleType
    {
        return TriangleType::equilateral();
    }
}