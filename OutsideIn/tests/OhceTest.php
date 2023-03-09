<?php

declare(strict_types=1);

namespace OhceKata\OutsideIn\Tests;

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

        $ohce = new Ohce($outputMock);
        $ohce->run('Pedro');
    }
}
