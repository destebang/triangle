<?php

namespace Tradeshift\Triangle\Tests\Unit\Domain\Model;

use PHPUnit\Framework\TestCase;
use Tradeshift\Triangle\Domain\Model\IsoscelesTriangle;

class IsoscelesTriangleTest extends TestCase
{
    /**
     * @test
     */
    public function can_not_be_created_with_equilater_sides()
    {
        $this->expectException(\InvalidArgumentException::class);

        new IsoscelesTriangle(TriangleSidesStub::equilater());
    }

    /**
     * @test
     */
    public function can_not_be_created_with_scalene_sides()
    {
        $this->expectException(\InvalidArgumentException::class);

        new IsoscelesTriangle(TriangleSidesStub::scalene());
    }

    /**
     * @test
     */
    public function is_characterized_by_two_different_lengths()
    {
        $this->assertSame(2, IsoscelesTriangle::differentLengthsForType());
    }
}
