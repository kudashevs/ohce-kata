<?php

declare(strict_types=1);

namespace OhceKata\InsideOut\Input;

interface InputInterface
{
    /**
     * Read a line from an input.
     *
     * @return string
     */
    public function readLine(): string;
}
