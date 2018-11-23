<?php

namespace Tradeshift\Triangle\Tests\Domain\Service;

use PHPUnit\Framework\TestCase;
use Tradeshift\Triangle\Domain\Model\EquilateralTriangle;
use Tradeshift\Triangle\Domain\Model\IsoscelesTriangle;
use Tradeshift\Triangle\Domain\Model\ScaleneTriangle;
use Tradeshift\Triangle\Domain\Model\TriangleSide;
use Tradeshift\Triangle\Domain\Model\TriangleType;
use Tradeshift\Triangle\Domain\Service\TriangleFactory;

class TriangleFactoryTest extends TestCase
{
    /**
     * @var TriangleFactory
     */
    private $factory;

    protected function setUp()
    {
        $this->factory = new TriangleFactory();
    }

    /** @test */
    public function it_creates_triangle_with_expected_sides()
    {
        $sides = [
            new TriangleSide(1.1),
            new TriangleSide(1.1),
            new TriangleSide(1.1)
        ];

        $equilateralTriangle = $this->factory->create(...$sides);

        $this->assertSame($sides[0], $equilateralTriangle->firstSide());
        $this->assertSame($sides[1], $equilateralTriangle->secondSide());
        $this->assertSame($sides[2], $equilateralTriangle->thirdSide());
    }

    /** @test */
    public function it_creates_a_equilateral_triangle_when_all_sides_are_equal()
    {
        $sides = [
            new TriangleSide(1.1),
            new TriangleSide(1.1),
            new TriangleSide(1.1)
        ];

        $equilateralTriangle = $this->factory->create(...$sides);

        $this->assertInstanceOf(EquilateralTriangle::class, $equilateralTriangle);
        $this->assertEquals(TriangleType::equilateral(), $equilateralTriangle->type());
    }

    /** @test */
    public function it_creates_a_isosceles_triangle_when_two_sides_are_equal()
    {
        $sides = [
            new TriangleSide(1.1),
            new TriangleSide(1.2),
            new TriangleSide(1.1)
        ];

        $isoscelesTriangle = $this->factory->create(...$sides);

        $this->assertInstanceOf(IsoscelesTriangle::class, $isoscelesTriangle);
        $this->assertEquals(TriangleType::isosceles(), $isoscelesTriangle->type());
    }

    /** @test */
    public function it_creates_a_scalene_triangle_when_no_sides_are_equal()
    {
        $sides = [
            new TriangleSide(1.1),
            new TriangleSide(1.2),
            new TriangleSide(1.3)
        ];

        $isoscelesTriangle = $this->factory->create(...$sides);

        $this->assertInstanceOf(ScaleneTriangle::class, $isoscelesTriangle);
        $this->assertEquals(TriangleType::scalene(), $isoscelesTriangle->type());
    }
}
