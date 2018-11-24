<?php

namespace Tradeshift\Triangle\Tests\Unit\Domain\Model;

use PHPUnit\Framework\TestCase;
use Tradeshift\Triangle\Domain\Model\TriangleSides;

class TriangleSidesTest extends TestCase
{
    /** @test */
    public function is_created_with_expected_sides(): void
    {
        $firstSide = TriangleSideStub::random();
        $secondSide = TriangleSideStub::random();
        $thirdSide = TriangleSideStub::random();
        $triangleSides = new TriangleSides($firstSide, $secondSide, $thirdSide);

        $this->assertSame($firstSide, $triangleSides->firstSide());
        $this->assertSame($secondSide, $triangleSides->secondSide());
        $this->assertSame($thirdSide, $triangleSides->thirdSide());
    }

    /** @test */
    public function it_returns_one_different_length_for_equilater(): void
    {
        $equilater = TriangleSidesStub::equilater();
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