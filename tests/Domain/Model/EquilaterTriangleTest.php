<?php

namespace Tradeshift\Triangle\Tests\Domain\Model;

use PHPUnit\Framework\TestCase;
use Tradeshift\Triangle\Domain\Model\EquilateralTriangle;

class EquilaterTriangleTest extends TestCase
{
    /**
     * @test
     */
    public function can_not_be_created_with_isosceles_sides()
    {
        $this->expectException(\InvalidArgumentException::class);

        new EquilateralTriangle(TriangleSidesStub::isosceles());
    }

    /**
     * @test
     */
    public function can_not_be_created_with_scalene_sides()
    {
        $this->expectException(\InvalidArgumentException::class);

        new EquilateralTriangle(TriangleSidesStub::scalene());
    }
}
