<?php

namespace OhceKata\InsideOut;

use DateTime;
use OhceKata\InsideOut\Input\InputInterface;
use OhceKata\InsideOut\Output\OutputInterface;
use PHPUnit\Framework\TestCase;

class OhceTest extends TestCase
{
    /** @test */
    public function it_can_greet_pedro_in_the_morning()
    {
        $inputMock = $this->createMock(InputInterface::class);
        $inputMock->expects($this->once())
            ->method('readLine')
            ->willReturn('Stop!');

        $outputMock = $this->createMock(OutputInterface::class);
        $outputMock->expects($this->exactly(2))
            ->method('writeLine')
            ->withConsecutive(
                [$this->stringContains('días')],
                [$this->stringContains('adios')],
            );

        $timeMock = $this->createMock(DateTime::class);
        $timeMock->expects($this->once())
            ->method('format')
            ->willReturn('900');

        $app = new Ohce($inputMock, $outputMock, $timeMock);
        $app->run('Pedro');
    }

    /** @test */
    public function it_can_greet_juan_and_process_a_non_palindrome()
    {
        $inputMock = $this->createMock(InputInterface::class);
        $inputMock->expects($this->exactly(2))
            ->method('readLine')
            ->willReturnOnConsecutiveCalls(
                'not',
                'Stop!',
            );

        $outputMock = $this->createMock(OutputInterface::class);
        $outputMock->expects($this->exactly(3))
            ->method('writeLine')
            ->withConsecutive(
                [$this->stringContains('noches')],
                [$this->stringContains('ton')],
                [$this->stringContains('adios')],
            );

        $timeMock = $this->createMock(DateTime::class);
        $timeMock->expects($this->once())
            ->method('format')
            ->willReturn('2100');

        $app = new Ohce($inputMock, $outputMock, $timeMock);
        $app->run('Juan');
    }

    /** @test */
    public function it_can_greet_albert_and_process_palindrome()
    {
        $inputMock = $this->createMock(InputInterface::class);
        $inputMock->expects($this->exactly(2))
            ->method('readLine')
            ->willReturnOnConsecutiveCalls(
                'ohoho',
                'Stop!',
            );

        $outputMock = $this->createMock(OutputInterface::class);
        $outputMock->expects($this->exactly(3))
            ->method('writeLine')
            ->withConsecutive(
                [$this->stringContains('noches')],
                [
                    $this->logicalAnd(
                        $this->stringContains('ohoho'),
                        $this->stringContains('palabra')
                    ),
                ],
                [$this->stringContains('adios')],
            );

        $timeMock = $this->createMock(DateTime::class);
        $timeMock->expects($this->once())
            ->method('format')
            ->willReturn('2100');

        $app = new Ohce($inputMock, $outputMock, $timeMock);
        $app->run('Albert');
    }

    /** @test */
    public function it_passes_the_example_equal_to_acceptance_test()
    {
        $inputMock = $this->createMock(InputInterface::class);
        $inputMock->expects($this->exactly(4))
            ->method('readLine')
            ->willReturnOnConsecutiveCalls(
                'hola',
                'oto',
                'stop',
                'Stop!',
            );

        $outputMock = $this->createMock(OutputInterface::class);
        $outputMock->expects($this->exactly(5))
            ->method('writeLine')
            ->withConsecutive(
                ['¡Buenos días Pedro!'],
                ['aloh'],
                ['oto' . PHP_EOL . '¡Bonita palabra!'],
                ['pots'],
                ['Adios Pedro'],
            );

        $timeMock = $this->createMock(DateTime::class);
        $timeMock->expects($this->once())
            ->method('format')
            ->willReturn('900');

        $app = new Ohce($inputMock, $outputMock, $timeMock);
        $app->run('Pedro');
    }
}
