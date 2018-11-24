<?php

declare(strict_types=1);

namespace Tradeshift\Triangle\Domain\Model;

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

    public function toArray(): array
    {
        return [
            $this->firstSide->length(),
            $this->secondSide->length(),
            $this->thirdSide->length(),
        ];
    }

    public function differentLengths(): int
    {
        $triangleSideToLength = function (TriangleSide $triangleSide): float {
            return $triangleSide->length();
        };

        $lengthsAsFloat = array_map(
            $triangleSideToLength,
            [
                $this->firstSide,
                $this->secondSide,
                $this->thirdSide
            ]
        );

        return count(array_unique($lengthsAsFloat));
    }

}