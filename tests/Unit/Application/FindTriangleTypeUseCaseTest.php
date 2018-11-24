<?php

namespace Tradeshift\Triangle\Tests\Unit\Application;

use Tradeshift\Triangle\Application\FindTriangleTypeRequest;
use Tradeshift\Triangle\Application\FindTriangleTypeResponse;
use Tradeshift\Triangle\Application\FindTriangleTypeUseCase;
use PHPUnit\Framework\TestCase;
use Tradeshift\Triangle\Domain\Service\TriangleFactory;

class FindTriangleTypeUseCaseTest extends TestCase
{
    /**
     * @var FindTriangleTypeUseCase
     */
    private $findTriangleTypeUseCase;


    protected function setUp()
    {
        $this->findTriangleTypeUseCase = new FindTriangleTypeUseCase(new TriangleFactory());
    }

    /**
     * @dataProvider side_types_provider
     * @param FindTriangleTypeRequest $request
     * @param FindTriangleTypeResponse $expectedResponse
     *
     * @test
     */
    public function test_it_returns_expected_response_from_request(
        FindTriangleTypeRequest $request,
        FindTriangleTypeResponse $expectedResponse
    ) {
        $response = $this->findTriangleTypeUseCase->execute($request);

        $this->assertEquals(
            $expectedResponse,
            $response
        );
    }

    public function side_types_provider(): array
    {
        return [
            'equilater' => [
                'request' => FindTriangleTypeRequestStub::equilateral(),
                'expected_response' => new FindTriangleTypeResponse('EQUILATERAL'),
            ],
            'isosceles' => [
                'request' => FindTriangleTypeRequestStub::isosceles(),
                'expected_response' => new FindTriangleTypeResponse('ISOSCELES'),
            ],
            'scalene' => [
                'request' => FindTriangleTypeRequestStub::scalene(),
                'expected_response' => new FindTriangleTypeResponse('SCALENE'),
            ],
        ];
    }
}
