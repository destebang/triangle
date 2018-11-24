<?php

namespace Tradeshift\Triangle\Tests\Unit\Domain\Model;

use PHPUnit\Framework\TestCase;
use Tradeshift\Triangle\Domain\Model\TriangleType;

class TriangleTypeTest extends TestCase
{
    /** @test **/
    public function can_not_be_created_with_wrong_type()
    {
        $this->expectException(\InvalidArgumentException::class);
        new TriangleType('PARALLELEPIPED');
    }
}