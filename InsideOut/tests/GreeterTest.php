<?php

declare(strict_types=1);

namespace OhceKata\InsideOut\Tests;

use OhceKata\InsideOut\Greeter;
use PHPUnit\Framework\TestCase;

class GreeterTest extends TestCase
{
    /** @test */
    public function it_can_return_buenas_noches_pedro()
    {
        $greeter = new Greeter();

        $this->assertSame('¡Buenas noches Pedro!', $greeter->process('Pedro'));
    }
}
