<?php

namespace Tradeshift\Triangle\Tests\Domain\Model;

use PHPUnit\Framework\TestCase;
use Tradeshift\Triangle\Domain\Model\IsoscelesTriangle;
use Tradeshift\Triangle\Domain\Model\TriangleSides;

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
}
