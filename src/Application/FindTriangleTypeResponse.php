<?php

declare(strict_types=1);

namespace Tradeshift\Triangle\Application;

class FindTriangleTypeResponse
{
    private $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    public function type(): string
    {
        return $this->type;
    }
}