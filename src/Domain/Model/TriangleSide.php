<?php

declare(strict_types=1);

namespace Tradeshift\Triangle\Domain\Model;

class TriangleSide
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
            throw new \InvalidArgumentException(
                sprintf("Length must be a positive non-zero value: <%u> provided", $length)
            );
        }
    }

    public function length(): float
    {
        return $this->length;
    }
}