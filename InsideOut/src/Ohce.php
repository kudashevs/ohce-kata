<?php

declare(strict_types=1);

namespace OhceKata\InsideOut;

use DateTime;
use OhceKata\InsideOut\Input\InputInterface;
use OhceKata\InsideOut\Output\OutputInterface;

class Ohce
{
    private const STOP_WORD = 'Stop!';

    private OutputInterface $output;
    private InputInterface $input;
    private Greeter $greeter;
    private Palindrome $palindrome;

    public function __construct(InputInterface $input, OutputInterface $output, DateTime $time)
    {
        $this->input = $input;
        $this->output = $output;

        $this->greeter = $this->initGreeter($time);
        $this->palindrome = $this->initPalindrome();
    }

    private function initGreeter(DateTime $time): Greeter
    {
        return new Greeter($time);
    }

    private function initPalindrome(): Palindrome
    {
        return new Palindrome();
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
        $greeting = $this->greeter->greet($name);

        $this->output->writeLine($greeting);
    }

    private function process(string $input): void
    {
        $processed = $this->palindrome->process($input);

        $this->output->writeLine($processed);
    }

    private function stop(string $name): void
    {
        $farewell = "Adios ${name}";

        $this->output->writeLine($farewell);
        $this->output->terminate(0);
    }
}
