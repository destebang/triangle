<?php

namespace Tradeshift\Triangle\Domain\Exception;

class InvalidTriangleSideLength extends \InvalidArgumentException
{
    public function __construct(float $length)
    {
        return parent::__construct(
            sprintf("Length must be a positive non-zero value: <%u> provided", $length)
        );
    }
}