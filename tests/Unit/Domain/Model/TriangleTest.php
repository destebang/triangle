<?php

namespace Tradeshift\Triangle\Tests\Unit\Domain\Model;

use PHPUnit\Framework\TestCase;
use Tradeshift\Triangle\Domain\Exception\InvalidTriangleTypeForSides;

class TriangleTest extends TestCase
{
    /** @test */
    public function can_not_be_created_with_invalid_triangle_type_for_sides()
    {
        $this->expectException(InvalidTriangleTypeForSides::class);

        TriangleStub::invalidTriangle();
    }


}