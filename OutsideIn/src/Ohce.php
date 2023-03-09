<?php

declare(strict_types=1);

namespace OhceKata\OutsideIn;

use OhceKata\InsideOut\Output\OutputInterface;

class Ohce
{
    private OutputInterface $output;

    public function __construct(OutputInterface $output)
    {
        $this->output = $output;
    }

    public function run(string $name): void
    {
        $this->greet($name);
    }

    private function greet(string $name): void
    {
        $greeting = "¡Buenas noches {$name}!";

        $this->output->writeLine($greeting);
    }
}
