<?php

declare(strict_types=1);

namespace Tradeshift\Triangle\Application;

use Tradeshift\Triangle\Domain\Model\TriangleSide;
use Tradeshift\Triangle\Domain\Model\TriangleSides;
use Tradeshift\Triangle\Domain\Service\TriangleFactory;

final class FindTriangleTypeUseCase
{
    private $factory;

    public function __construct(TriangleFactory $factory)
    {
        $this->factory = $factory;
    }

    public function execute(FindTriangleTypeRequest $findTriangleTypeRequest): FindTriangleTypeResponse
    {
        $triangle = $this->factory->create(
            new TriangleSides(
                new TriangleSide($findTriangleTypeRequest->firstSideLength()),
                new TriangleSide($findTriangleTypeRequest->secondSideLength()),
                new TriangleSide($findTriangleTypeRequest->thirdSideLength())
            )
        );

        return new FindTriangleTypeResponse((string) $triangle->type());
    }
}