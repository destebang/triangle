<?php

declare(strict_types=1);

namespace Tradeshift\Triangle\Domain\Model;

use Tradeshift\Triangle\Domain\Exception\InvalidTriangleInequality;

class TriangleSides
{
    private $firstSide;
    private $secondSide;
    private $thirdSide;

    public function __construct(
        TriangleSide $firstSide,
        TriangleSide $secondSide,
        TriangleSide $thirdSide
    ) {
        $this->guardAgainstInvalidTriangleInequality($firstSide, $secondSide, $thirdSide);

        $this->firstSide = $firstSide;
        $this->secondSide = $secondSide;
        $this->thirdSide = $thirdSide;
    }

    public function differentLengths(): int
    {
        return count(array_unique($this->toArray()));
    }

    public function toArray(): array
    {
        return [
            $this->firstSide->length(),
            $this->secondSide->length(),
            $this->thirdSide->length(),
        ];
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

    /**
     * @param TriangleSide $firstSide
     * @param TriangleSide $secondSide
     * @param TriangleSide $thirdSide
     */
    private function guardAgainstInvalidTriangleInequality(
        TriangleSide $firstSide,
        TriangleSide $secondSide,
        TriangleSide $thirdSide
    ): void {
        if ($firstSide->length() + $secondSide->length() < $thirdSide->length()
            || $firstSide->length() + $thirdSide->length() < $secondSide->length()
            || $secondSide->length() + $thirdSide->length() < $firstSide->length()) {
            throw new InvalidTriangleInequality();
        }
    }
}