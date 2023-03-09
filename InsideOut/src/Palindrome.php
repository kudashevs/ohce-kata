<?php

declare(strict_types=1);

namespace OhceKata\InsideOut;

class Palindrome
{
    private const PALINDROME_MESSAGE = '¡Bonita palabra!';

    public function process(string $str): string
    {
        if ($this->isPalindrome($str)) {
            return $str . PHP_EOL . self::PALINDROME_MESSAGE;
        }

        return strrev($str);
    }

    private function isPalindrome(string $str): bool
    {
        if (strlen($str) < 2) {
            return false;
        }

        $letters = str_split($str);

        return $letters === array_reverse($letters);
    }
}
