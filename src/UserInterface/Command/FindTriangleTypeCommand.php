<?php

namespace Tradeshift\Triangle\UserInterface\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Tradeshift\Triangle\Application\FindTriangleTypeRequest;
use Tradeshift\Triangle\Application\FindTriangleTypeUseCase;
use Tradeshift\Triangle\Domain\Service\TriangleFactory;

class FindTriangleTypeCommand extends Command
{
    /**
     * @var FindTriangleTypeUseCase $findTriangleTypeUseCase
     */
    private $findTriangleTypeUseCase;


    protected function configure()
    {
        $this->findTriangleTypeUseCase = $this->buildUseCase();
        $this
            ->setName('triangle:find-type')
            ->addArgument(
                'sides',
                InputArgument::IS_ARRAY,
                'Sequence of non-negative greater than zero floats'
            )
            ->setDescription('Calculates the type of a triangle given the side lengths');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $sides = $input->getArgument('sides');

        $triangleTypeResponse = $this->findTriangleTypeUseCase->execute(
            $this->buildRequestFromCommandParams($sides)
        );

        $output->writeln($triangleTypeResponse->type());
    }

    private function buildUseCase(): FindTriangleTypeUseCase
    {
        return new FindTriangleTypeUseCase(new TriangleFactory());
    }

    private function buildRequestFromCommandParams(array $sides): FindTriangleTypeRequest
    {
        if (count($sides) !== 3) {
            throw new \InvalidArgumentException(sprintf("Must provide exactly 3 sides, <%d> provided", count($sides)));
        }

        foreach ($sides as $side) {
            if (!filter_var($side, FILTER_VALIDATE_FLOAT)) {
                throw new \InvalidArgumentException("All sides provided must be a float");
            }
        }

        return new FindTriangleTypeRequest(
            (float) $sides[0],
            (float) $sides[1],
            (float) $sides[2]
        );
    }
}
