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
}
