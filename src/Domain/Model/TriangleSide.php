<?php

declare(strict_types=1);

namespace Tradeshift\Triangle\Domain\Model;

use Tradeshift\Triangle\Domain\Exception\InvalidTriangleSideLength;

final class TriangleSide
{
    /**
     * @var float
     */
    private $length;

    public function __construct(float $length)
    {
        $this->guardAgainstInvalidLength($length);
        $this->length = $length;
    }

    private function guardAgainstInvalidLength(float $length): void
    {
        if ($length <= 0) {
            throw new InvalidTriangleSideLength($length);
        }
    }

    public function equals(TriangleSide $anotherTriangleSide): bool
    {
        return $this->length === $anotherTriangleSide->length();
    }

    public function length(): float
    {
        return $this->length;
    }
}