<?php

declare(strict_types=1);

namespace OhceKata\InsideOut;

class Palindrome
{
    public function process(string $str): string
    {
        if ($this->isPalindrome($str)) {
            return $str . PHP_EOL . '¡Bonita palabra!';
        }

        return strrev($str);
    }

    public function isPalindrome(string $str): bool
    {
        if (strlen($str) < 2) {
            return false;
        }

        $letters = str_split($str);

        return $letters === array_reverse($letters);
    }
}
