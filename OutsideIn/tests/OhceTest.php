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

        $outputMock = $this->createMock(OutputInterface::class);
        $outputMock->expects($this->atLeastOnce())
            ->method('writeLine')
            ->withConsecutive(
                ['¡Buenas noches Pedro!'],
                [$this->stringContains('adios')],
            );

        $timeStub = $this->createStub(DateTime::class);
        $timeStub->method('format')
            ->willReturn('21');

        $ohce = new Ohce($inputMock, $outputMock, $timeStub);
        $ohce->run('Pedro');
    }

    /** @test */
    public function it_can_greet_juan_in_the_morning()
    {
        $inputMock = $this->createInputMock([]);

        $outputMock = $this->createMock(OutputInterface::class);
        $outputMock->expects($this->atLeastOnce())
            ->method('writeLine')
            ->withConsecutive(
                ['¡Buenos días Juan!'],
                [$this->stringContains('adios')],
            );

        $timeStub = $this->createStub(DateTime::class);
        $timeStub->method('format')
            ->willReturn('6');

        $ohce = new Ohce($inputMock, $outputMock, $timeStub);
        $ohce->run('Juan');
    }

    /** @test */
    public function it_can_greet_albert_during_the_noon()
    {
        $inputMock = $this->createInputMock([]);

        $outputMock = $this->createMock(OutputInterface::class);
        $outputMock->expects($this->atLeastOnce())
            ->method('writeLine')
            ->withConsecutive(
                ['¡Buenas tardes Albert!'],
                [$this->stringContains('adios')],
            );

        $timeStub = $this->createStub(DateTime::class);
        $timeStub->method('format')
            ->willReturn('13');

        $ohce = new Ohce($inputMock, $outputMock, $timeStub);
        $ohce->run('Albert');
    }

    /** @test */
    public function it_can_stop_processing()
    {
        $inputMock = $this->createInputMock([]);

        $outputMock = $this->createMock(OutputInterface::class);
        $outputMock->expects($this->atLeastOnce())
            ->method('writeLine')
            ->withConsecutive(
                [$this->anything()],
                [$this->stringContains('adios')],
            );

        $timeStub = $this->createStub(DateTime::class);
        $timeStub->method('format')
            ->willReturn('13');

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
}
