<?php

declare(strict_types=1);

namespace OhceKata\OutsideIn\Input;

class CliInput implements InputInterface
{
    public function readLine(): string
    {
        return trim(fgets(STDIN));
    }
}
