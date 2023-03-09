<?php

declare(strict_types=1);

namespace OhceKata\OutsideIn\Tests;

use DateTime;
use OhceKata\InsideOut\Output\OutputInterface;
use OhceKata\OutsideIn\Ohce;
use PHPUnit\Framework\TestCase;

class OhceTest extends TestCase
{
    /** @test */
    public function it_can_greet_pedro_in_the_night()
    {
        $outputMock = $this->createMock(OutputInterface::class);
        $outputMock->expects($this->once())
            ->method('writeLine')
            ->with('¡Buenas noches Pedro!');

        $timeStub = $this->createStub(DateTime::class);
        $timeStub->method('format')
            ->willReturn('21');

        $ohce = new Ohce($outputMock, $timeStub);
        $ohce->run('Pedro');
    }

    /** @test */
    public function it_can_greet_juan_in_the_morning()
    {
        $outputMock = $this->createMock(OutputInterface::class);
        $outputMock->expects($this->once())
            ->method('writeLine')
            ->with('¡Buenos días Juan!');

        $timeStub = $this->createStub(DateTime::class);
        $timeStub->method('format')
            ->willReturn('6');

        $ohce = new Ohce($outputMock, $timeStub);
        $ohce->run('Juan');
    }
}
