<?php

declare(strict_types=1);

namespace OhceKata\OutsideIn\Tests;

use DateTime;
use OhceKata\InsideOut\Input\InputInterface;
use OhceKata\InsideOut\Output\OutputInterface;
use OhceKata\OutsideIn\Ohce;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class OhceTest extends TestCase
{
    /** @test */
    public function it_can_greet_pedro_in_the_night()
    {
        $inputMock = $this->createInputMock([]);
        $outputMock = $this->createOutputMock(['¡Buenas noches Pedro!']);
        $timeStub = $this->createTimeStub('21:00');

        $ohce = new Ohce($inputMock, $outputMock, $timeStub);
        $ohce->run('Pedro');
    }

    /** @test */
    public function it_can_greet_juan_in_the_morning()
    {
        $inputMock = $this->createInputMock([]);
        $outputMock = $this->createOutputMock(['¡Buenos días Juan!']);
        $timeStub = $this->createTimeStub('6:00');

        $ohce = new Ohce($inputMock, $outputMock, $timeStub);
        $ohce->run('Juan');
    }

    /** @test */
    public function it_can_greet_albert_during_the_noon()
    {
        $inputMock = $this->createInputMock([]);
        $outputMock = $this->createOutputMock(['¡Buenas tardes Albert!']);
        $timeStub = $this->createTimeStub('13:00');

        $ohce = new Ohce($inputMock, $outputMock, $timeStub);
        $ohce->run('Albert');
    }

    /** @test */
    public function it_can_stop_processing()
    {
        $inputMock = $this->createInputMock([]);
        $outputMock = $this->createOutputMock([$this->anything()]);
        $timeStub = $this->createTimeStub('13:00');

        $ohce = new Ohce($inputMock, $outputMock, $timeStub);
        $ohce->run('Pedro');
    }

    /** @test */
    public function it_can_process_a_non_palidrome()
    {
        $inputMock = $this->createInputMock(['not']);
        $outputMock = $this->createOutputMock([
            $this->stringContains('Pedro'),
            'ton',
        ]);
        $timeStub = $this->createTimeStub('13:00');

        $ohce = new Ohce($inputMock, $outputMock, $timeStub);
        $ohce->run('Pedro');
    }

    /** @test */
    public function it_can_process_a_palindrome()
    {
        $inputMock = $this->createInputMock(['non']);
        $outputMock = $this->createOutputMock([
            $this->stringContains('Pedro'),
            'non' . PHP_EOL . '¡Bonita palabra!',
        ]);
        $timeStub = $this->createTimeStub('13:00');

        $ohce = new Ohce($inputMock, $outputMock, $timeStub);
        $ohce->run('Pedro');
    }

    /**
     * @return MockObject
     */
    private function createInputMock(array $returns): InputInterface
    {
        $consecutiveReturns = array_merge($returns, ['Stop!']);

        $inputMock = $this->createStub(InputInterface::class);
        $inputMock->expects($this->atLeastOnce())
            ->method('readLine')
            ->willReturnOnConsecutiveCalls(
                ...$consecutiveReturns,
            );

        return $inputMock;
    }

    /**
     * @return MockObject
     */
    private function createOutputMock(array $arguments): OutputInterface
    {
        $consecutiveArguments = array_map(function ($argument) {
            return [$argument];
        }, array_merge($arguments, [$this->stringContains('adios')]));

        $outputMock = $this->createMock(OutputInterface::class);
        $outputMock->expects($this->atLeastOnce())
            ->method('writeLine')
            ->withConsecutive(
                ...$consecutiveArguments,
            );

        return $outputMock;
    }

    /**
     * @return MockObject
     */
    private function createTimeStub(string $hour): DateTime
    {
        $time = str_replace(':', '', $hour);
        $timeStub = $this->createStub(DateTime::class);
        $timeStub->method('format')
            ->willReturn($time);

        return $timeStub;
    }
}
