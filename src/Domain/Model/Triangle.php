<?php

declare(strict_types=1);

namespace Tradeshift\Triangle\Domain\Model;

abstract class Triangle
{
    private $triangleSides;

    public function __construct(TriangleSides $triangleSides)
    {
        $this->triangleSides = $triangleSides;
        $this->assertDifferentLengthsIsMatchingWithType();
    }

    private function assertDifferentLengthsIsMatchingWithType(): void
    {
        $differentLengths = $this->triangleSides->differentLengths();

        if ($differentLengths !== $this->differentLengthsForType()) {
            throw new \InvalidArgumentException(
                sprintf(
                    "A <%s> triangle can not be created with <%d> different lengths",
                    $this->type(),
                    $differentLengths
                )
            );
        }
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

    abstract public static function differentLengthsForType(): int;
}