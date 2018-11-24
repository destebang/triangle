<?php

declare(strict_types=1);

namespace Tradeshift\Triangle\Domain\Model;

use Tradeshift\Triangle\Domain\Exception\InvalidTriangleTypeForSides;

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
            throw new InvalidTriangleTypeForSides(
                $this->type(),
                $differentLengths
            );
        }
    }

    public function sides(): TriangleSides
    {
        return $this->triangleSides;
    }

    abstract public function type(): TriangleType;

    abstract public static function differentLengthsForType(): int;
}