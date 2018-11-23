<?php

namespace Tradeshift\Triangle\Tests\Domain\Model;

use PHPUnit\Framework\TestCase;
use Tradeshift\Triangle\Domain\Model\TriangleSide;

class TriangleSideTest extends TestCase
{
    /** @test **/
    public function throws_exception_for_zero_length(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new TriangleSide(0);
    }

    /** @test **/
    public function throws_exception_for_negative_length(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new TriangleSide(-1.23);
    }

    /** @test **/
    public function is_created_with_expected_length(): void
    {
        $length = 2.32;
        $triangleSide = new TriangleSide($length);
        $this->assertSame($length, $triangleSide->length());
    }

    /** @test */
    public function is_equal_when_length_matches_with_other_triangle_side(): void
    {
        $length = 2.32;
        $triangleSide = new TriangleSide($length);
        $anotherTriangleSide = new TriangleSide($length);
        $this->assertTrue($triangleSide->equals($anotherTriangleSide));
    }
}