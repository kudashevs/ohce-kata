<?php

declare(strict_types=1);

namespace OhceKata\OutsideIn\Input;

interface InputInterface
{
    /**
     * Read a line from an input.
     *
     * @return string
     */
    public function readLine(): string;
}
