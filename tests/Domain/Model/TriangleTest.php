<?php

namespace Tradeshift\Triangle\Tests\Domain\Model;

use PHPUnit\Framework\TestCase;
use Tradeshift\Triangle\Domain\Model\Triangle;
use Tradeshift\Triangle\Domain\Model\TriangleSide;

class TriangleTest extends TestCase
{
    /** @test */
    public function is_created_with_expected_sides(): void
    {
        $firstSide = new TriangleSide(2.12);
        $secondSide = new TriangleSide(2.22);
        $thirdSide = new TriangleSide(2.32);

        $triangle = new Triangle($firstSide, $secondSide, $thirdSide);

        $this->assertSame($firstSide, $triangle->firstSide());
        $this->assertSame($secondSide, $triangle->secondSide());
        $this->assertSame($thirdSide, $triangle->thirdSide());
    }
}