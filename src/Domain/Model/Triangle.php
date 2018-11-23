<?php

declare(strict_types=1);

namespace Tradeshift\Triangle\Domain\Model;

class Triangle
{
    private $firstSide;
    private $secondSide;
    private $thirdSide;

    public function __construct(TriangleSide $firstSide, TriangleSide $secondSide, TriangleSide $thirdSide)
    {
        $this->firstSide = $firstSide;
        $this->secondSide = $secondSide;
        $this->thirdSide = $thirdSide;
    }

    public function firstSide(): TriangleSide
    {
        return $this->firstSide;
    }

    public function secondSide(): TriangleSide
    {
        return $this->secondSide;
    }

    public function thirdSide(): TriangleSide
    {
        return $this->thirdSide;
    }
}