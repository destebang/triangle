<?php

namespace Tradeshift\Triangle\Tests\Unit\Domain\Model;

use PHPUnit\Framework\TestCase;
use Tradeshift\Triangle\Domain\Exception\InvalidTriangleInequality;
use Tradeshift\Triangle\Domain\Model\TriangleSides;

class TriangleSidesTest extends TestCase
{
    /** @test */
    public function it_throws_exception_for_when_triangle_inequality_fails_for_isosceles(): void
    {
        $this->expectException(InvalidTriangleInequality::class);
        TriangleSidesStub::invalidIsosceles();
    }

    /** @test */
    public function it_throws_exception_for_when_triangle_inequality_fails_for_scalene(): void
    {
        $this->expectException(InvalidTriangleInequality::class);
        TriangleSidesStub::invalidScalene();
    }

    /** @test */
    public function is_created_with_expected_sides(): void
    {
        $firstSide = TriangleSideStub::create(1);
        $secondSide = TriangleSideStub::create(2);
        $thirdSide = TriangleSideStub::create(3);
        $triangleSides = new TriangleSides($firstSide, $secondSide, $thirdSide);

        $this->assertSame($firstSide, $triangleSides->firstSide());
        $this->assertSame($secondSide, $triangleSides->secondSide());
        $this->assertSame($thirdSide, $triangleSides->thirdSide());
    }

    /** @test */
    public function it_returns_one_different_length_for_equilater(): void
    {
        $equilater = TriangleSidesStub::equilateral();
        $this->assertSame(1, $equilater->differentLengths());
    }


    /** @test */
    public function it_returns_two_different_length_for_isosceles(): void
    {
        $isosceles = TriangleSidesStub::isosceles();
        $this->assertSame(2, $isosceles->differentLengths());
    }


    /** @test */
    public function it_returns_one_different_length_for_scalene(): void
    {
        $scalene = TriangleSidesStub::scalene();
        $this->assertSame(3, $scalene->differentLengths());
    }

    /** @test */
    public function it_can_be_converted_to_array(): void
    {
        $sides = [1.14, 2.32, 3.33];
        $triangle = TriangleSidesStub::createFromFloat(...$sides);
        $this->assertEquals(
            $sides,
            $triangle->toArray()
        );
    }
}