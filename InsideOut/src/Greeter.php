<?php

declare(strict_types=1);

namespace OhceKata\InsideOut;

use DateTime;

class Greeter
{
    private DateTime $time;

    public function __construct(DateTime $time)
    {
        $this->time = $time;
    }

    public function greet(string $name): string
    {
        $hour = (int)$this->time->format('H');

        if ($hour >= 6 && $hour <= 12) {
            return "¡Buenos días {$name}!";
        }

        return "¡Buenas noches {$name}!";
    }
}
