<?php

declare(strict_types=1);

namespace OhceKata\OutsideIn;

use DateTime;
use OhceKata\InsideOut\Output\OutputInterface;

class Ohce
{
    private OutputInterface $output;
    private DateTime $time;

    public function __construct(OutputInterface $output, DateTime $time)
    {
        $this->output = $output;
        $this->time = $time;
    }

    public function run(string $name): void
    {
        $this->greet($name);
    }

    private function greet(string $name): void
    {
        $hour = (int)$this->time->format('H');

        if ($hour >= 6 && $hour < 12) {
            $greeting = "¡Buenos días {$name}!";
        } elseif ($hour >= 12 && $hour < 20) {
            $greeting = "¡Buenas tardes {$name}!";
        } else {
            $greeting = "¡Buenas noches {$name}!";
        }

        $this->output->writeLine($greeting);
    }
}
