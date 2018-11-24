<?php

namespace Tradeshift\Triangle\Tests\Unit\Domain\Model;

use PHPUnit\Framework\TestCase;
use Tradeshift\Triangle\Domain\Model\IsoscelesTriangle;
use Tradeshift\Triangle\Domain\Model\TriangleType;

class IsoscelesTriangleTest extends TestCase
{
    /**
     * @test
     */
    public function is_characterized_by_two_different_lengths()
    {
        $this->assertSame(2, IsoscelesTriangle::differentLengthsForType());
    }

    /**
     * @test
     */
    public function has_valid_type()
    {
        $this->assertEquals(
            TriangleType::isosceles(),
            TriangleStub::isosceles()->type()
        );
    }
}
