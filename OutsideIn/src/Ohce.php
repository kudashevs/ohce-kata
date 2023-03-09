<?php

declare(strict_types=1);

namespace OhceKata\OutsideIn;

use DateTime;
use OhceKata\InsideOut\Input\InputInterface;
use OhceKata\InsideOut\Output\OutputInterface;

class Ohce
{
    private InputInterface $input;
    private OutputInterface $output;
    private DateTime $time;

    public function __construct(InputInterface $input, OutputInterface $output, DateTime $time)
    {
        $this->input = $input;
        $this->output = $output;
        $this->time = $time;
    }

    public function run(string $name): void
    {
        $this->greet($name);

        while (($next = $this->input->readLine()) !== 'Stop!') {
        }

        $this->stop($name);
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

    private function stop(string $name): void
    {
        $farewell = "Adios {$name}";

        $this->output->writeLine($farewell);
    }
}
