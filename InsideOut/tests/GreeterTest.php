<?php

declare(strict_types=1);

namespace OhceKata\InsideOut\Tests;

use DateTime;
use OhceKata\InsideOut\Greeter;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class GreeterTest extends TestCase
{
    /** @test */
    public function it_can_greet_juan_in_the_morning(): void
    {
        $timeStub = $this->createTimeStub('7:00');
        $greeter = new Greeter($timeStub);

        $this->assertSame('¡Buenos días Juan!', $greeter->greet('Juan'));
    }

    /** @test */
    public function it_can_greet_pedro_in_the_midnight()
    {
        $timeStub = $this->createTimeStub('00:00');
        $greeter = new Greeter($timeStub);

        $this->assertSame('¡Buenas noches Pedro!', $greeter->greet('Pedro'));
    }

    /**
     * @test
     * @dataProvider provideDifferentHoursForPedro
     */
    public function it_can_greet_pedro_in_time(DateTime $time, string $expected)
    {
        $greeter = new Greeter($time);

        $this->assertSame($expected, $greeter->greet('Pedro'));
    }

    public function provideDifferentHoursForPedro(): array
    {
        /**
         * 20:00 => 05:59 is equal to night
         * 06:00 => 11:59 is equal to morning
         * 12:00 => 19:59 is equal to noon
         */
        return [
            'before night greeting' => [$this->createTimeStub('19:59'), '¡Buenas tardes Pedro!'],
            'night greeting' => [$this->createTimeStub('20:00'), '¡Buenas noches Pedro!'],
            'after night greeting' => [$this->createTimeStub('20:01'), '¡Buenas noches Pedro!'],
            'midnight greeting' => [$this->createTimeStub('00:00'), '¡Buenas noches Pedro!'],
            'before morning greeting' => [$this->createTimeStub('5:59'), '¡Buenas noches Pedro!'],
            'morning greeting' => [$this->createTimeStub('6:00'), '¡Buenos días Pedro!'],
            'after morning greeting' => [$this->createTimeStub('6:01'), '¡Buenos días Pedro!'],
            'before noon greeting' => [$this->createTimeStub('11:59'), '¡Buenos días Pedro!'],
            'noon greeting' => [$this->createTimeStub('12:00'), '¡Buenas tardes Pedro!'],
            'after noon greeting' => [$this->createTimeStub('12:01'), '¡Buenas tardes Pedro!'],
        ];
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
