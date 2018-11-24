<?php

namespace Tradeshift\Triangle\Tests\Unit\Domain\Model;

use PHPUnit\Framework\TestCase;
use Tradeshift\Triangle\Domain\Model\EquilateralTriangle;
use Tradeshift\Triangle\Domain\Model\TriangleType;

class EquilaterTriangleTest extends TestCase
{
    /**
     * @test
     */
    public function is_characterized_by_one_different_length()
    {
        $this->assertSame(1, EquilateralTriangle::differentLengthsForType());
    }

    /**
     * @test
     */
    public function has_valid_type()
    {
        $this->assertEquals(
            TriangleType::equilateral(),
            TriangleStub::equilateral()->type()
        );
    }
}
