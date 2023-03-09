<?php

declare(strict_types=1);

namespace OhceKata\InsideOut\Input;

class CliInput implements InputInterface
{
    public function readLine(): string
    {
        return trim(fgets(STDIN));
    }
}
