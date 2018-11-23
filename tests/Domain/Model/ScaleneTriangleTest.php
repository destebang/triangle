<?php

namespace Tradeshift\Triangle\Tests\Domain\Model;

use Tradeshift\Triangle\Domain\Model\EquilateralTriangle;
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
}
