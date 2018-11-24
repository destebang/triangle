<?php

namespace Tradeshift\Triangle\Domain\Exception;

use Tradeshift\Triangle\Domain\Model\TriangleType;

class InvalidTriangleTypeForSides extends \DomainException
{
    public function __construct(TriangleType $type, int $differentLengths)
    {
        parent::__construct(
            sprintf(
                "A <%s> triangle can not be created with <%d> different lengths",
                $type,
                $differentLengths
            )
        );
    }
}