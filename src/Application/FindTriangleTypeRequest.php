<?php

namespace Tradeshift\Triangle\Application;

class FindTriangleTypeRequest
{
    private $firstSideLength;
    private $secondSideLength;
    private $thirdSideLength;

    public function __construct(float $firstSideLength, float $secondSideLength, float $thirdSideLength)
    {
        $this->firstSideLength = $firstSideLength;
        $this->secondSideLength = $secondSideLength;
        $this->thirdSideLength = $thirdSideLength;
    }

    public function firstSideLength(): float
    {
        return $this->firstSideLength;
    }

    public function secondSideLength(): float
    {
        return $this->secondSideLength;
    }

    public function thirdSideLength(): float
    {
        return $this->thirdSideLength;
    }
}