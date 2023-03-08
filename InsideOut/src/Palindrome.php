<?php

declare(strict_types=1);

namespace OhceKata\InsideOut;

class Palindrome
{
    public function isPalindrome(string $str): bool
    {
        $letters = str_split($str);

        return count($letters) > 1 && $letters === array_reverse($letters);
    }
}
