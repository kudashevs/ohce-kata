<?php

declare(strict_types=1);

namespace OhceKata\InsideOut;

class Palindrome
{
    public function isPalindrome(string $str): bool
    {
        if (strlen($str) < 2) {
            return false;
        }

        $letters = str_split($str);

        return $letters === array_reverse($letters);
    }
}
