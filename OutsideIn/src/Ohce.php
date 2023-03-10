<?php

declare(strict_types=1);

namespace OhceKata\OutsideIn;

use DateTime;
use OhceKata\InsideOut\Input\InputInterface;
use OhceKata\InsideOut\Output\OutputInterface;

class Ohce
{
    private const STOP_WORD = 'Stop!';

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

        while (($next = $this->input->readLine()) !== self::STOP_WORD) {
            $this->process($next);
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

    private function process(string $input)
    {
        if ($this->isPalindrome($input)) {
            $output = $input . PHP_EOL . '¡Bonita palabra!';
        } else {
            $output = strrev($input);
        }

        $this->output->writeLine($output);
    }

    private function isPalindrome(string $input): bool
    {
        $letters = str_split($input);

        return count($letters) > 1 && $letters === array_reverse($letters);
    }

    private function stop(string $name): void
    {
        $farewell = "Adios {$name}";

        $this->output->writeLine($farewell);
    }
}
