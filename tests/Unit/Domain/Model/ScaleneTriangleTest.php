<?php

namespace Tradeshift\Triangle\Tests\Unit\Domain\Model;

use PHPUnit\Framework\TestCase;
use Tradeshift\Triangle\Domain\Model\ScaleneTriangle;

class ScaleneTriangleTest extends TestCase
{
    /**
     * @test
     */
    public function can_not_be_created_with_equilater_sides()
    {
        $this->expectException(\InvalidArgumentException::class);

        new ScaleneTriangle(TriangleSidesStub::equilater());
    }

    /**
     * @test
     */
    public function can_not_be_created_with_isosceles_sides()
    {
        $this->expectException(\InvalidArgumentException::class);

        new ScaleneTriangle(TriangleSidesStub::isosceles());
    }

    /**
     * @test
     */
    public function is_characterized_by_three_different_lengths()
    {
        $this->assertSame(3, ScaleneTriangle::differentLengthsForType());
    }
}
