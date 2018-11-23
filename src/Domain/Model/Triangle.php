<?php

declare(strict_types=1);

namespace Tradeshift\Triangle\Domain\Model;

abstract class Triangle
{
    private $triangleSides;

    public function __construct(TriangleSides $triangleSides)
    {
        $this->triangleSides = $triangleSides;
    }

    public function firstSide(): TriangleSide
    {
        return $this->triangleSides->firstSide();
    }

    public function secondSide(): TriangleSide
    {
        return $this->triangleSides->secondSide();
    }

    public function thirdSide(): TriangleSide
    {
        return $this->triangleSides->thirdSide();
    }

    abstract public function type(): TriangleType;
}