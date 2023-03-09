<?php

declare(strict_types=1);

namespace OhceKata\InsideOut\Output;

interface OutputInterface
{
    /**
     * Write a line to an output.
     *
     * @param string $str
     */
    public function writeLine(string $str): void;
}
