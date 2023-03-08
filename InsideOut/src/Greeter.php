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
        $hour = (int)$this->time->format('Hi');

        if ($hour >= 600 && $hour < 1200) {
            return "¡Buenos días {$name}!";
        }

        if ($hour >= 1200 && $hour < 2000) {
            return "¡Buenas tardes {$name}!";
        }

        return "¡Buenas noches {$name}!";
    }
}
