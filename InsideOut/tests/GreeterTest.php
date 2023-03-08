<?php

declare(strict_types=1);

namespace OhceKata\InsideOut\Tests;

use DateTime;
use OhceKata\InsideOut\Greeter;
use PHPUnit\Framework\TestCase;

class GreeterTest extends TestCase
{
    /** @test */
    public function it_can_return_buenas_noches_pedro()
    {
        $timeStub = $this->createStub(DateTime::class);
        $timeStub->method('format')
            ->willReturn('00');
        $greeter = new Greeter($timeStub);

        $this->assertSame('¡Buenas noches Pedro!', $greeter->process('Pedro'));
    }

    /** @test */
    public function it_can_return_buenos_dias_pedro()
    {
        $timeStub = $this->createStub(DateTime::class);
        $timeStub->method('format')
            ->willReturn('7');
        $greeter = new Greeter($timeStub);

        $this->assertSame('¡Buenos días Pedro!', $greeter->process('Pedro'));
    }
}
