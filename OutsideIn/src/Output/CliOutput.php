<?php

declare(strict_types=1);

namespace OhceKata\OutsideIn\Output;

class CliOutput implements OutputInterface
{
    public function writeLine(string $str): void
    {
        $trimmed = trim($str);

        fwrite(STDOUT, $trimmed . PHP_EOL);
    }

    public function terminate(int $code = 0): void
    {
        exit($code);
    }
}
