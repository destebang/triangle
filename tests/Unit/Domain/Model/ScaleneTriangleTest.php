<?php

namespace Tradeshift\Triangle\Tests\Unit\Domain\Model;

use PHPUnit\Framework\TestCase;
use Tradeshift\Triangle\Domain\Model\ScaleneTriangle;
use Tradeshift\Triangle\Domain\Model\TriangleType;

class ScaleneTriangleTest extends TestCase
{
    /**
     * @test
     */
    public function is_characterized_by_three_different_lengths()
    {
        $this->assertSame(3, ScaleneTriangle::differentLengthsForType());
    }

    /**
     * @test
     */
    public function has_valid_type()
    {
        $this->assertEquals(
            TriangleType::scalene(),
            TriangleStub::scalene()->type()
        );
    }
}
