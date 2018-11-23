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
        $triangleSide = TriangleSideStub::create(2.32);
        $this->assertSame(2.32, $triangleSide->length());
    }

    /** @test */
    public function is_equal_when_length_matches_with_other_triangle_side(): void
    {
        $triangleSide = TriangleSideStub::create(2.32);
        $equalsTriangleSide = TriangleSideStub::create(2.32);
        $this->assertTrue($triangleSide->equals($equalsTriangleSide));
    }

    /** @test */
    public function is_not_equal_when_length_does_not_match_with_other_triangle_side(): void
    {
        $triangleSide = TriangleSideStub::create(2.32);
        $notEqualsTriangleSide = TriangleSideStub::random();
        $this->assertFalse($triangleSide->equals($notEqualsTriangleSide));
    }
}