<?php

declare(strict_types=1);

namespace OhceKata\InsideOut;

class Greeter
{
    public function process(string $name): string
    {
        return "¡Buenas noches {$name}!";
    }
}
