<?php

namespace Tradeshift\Triangle\Domain\Model;

final class ScaleneTriangle extends Triangle
{
    public function type(): TriangleType
    {
        return TriangleType::scalene();
    }
}